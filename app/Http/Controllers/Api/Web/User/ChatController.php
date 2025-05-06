<?php

namespace App\Http\Controllers\Api\Web\User;


use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\DB;

class ChatController extends BaseController
{
    public function getConversations()
    {
        return $this->sendResponse(Auth::user()->conversations()->with('users')->get(), 'Conversations fetched successfully');
    }

    public function getMessages($id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        return $this->sendResponse($conversation->messages()->with('user')->latest()->limit(50)->get()->reverse()->values(), 'Messages fetched successfully');
    }

    public function sendMessage(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        $validator = \Validator::make($request->all(), [
            'type' => 'required|in:text,image,video,file,audio,sticker',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'content' => $request->content,
            'file_name' => $request->file_name,
            'file_size' => $request->file_size,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message->load('user'), 201);
    }

    private function authorizeUserInConversation(Conversation $conversation)
    {
        if (!$conversation->users()->where('user_id', Auth::user()->id)->exists()) {
            abort(403, 'Unauthorized');
        }
    }
    

    public function startConversation(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:clients,id',
            'is_group' => 'boolean',
            'name' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors(), 422);
        }

        // Handle avatar upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        DB::beginTransaction();
        try {
            $conversation = Conversation::create([
                'is_group' => $request->get('is_group', false),
                'name' => $request->name,
                'avatar' => $avatarPath,
                'created_by' => Auth::user()->id,
            ]);

            $conversation->users()->attach(array_unique([...$request->user_ids, Auth::user()->id]));

            DB::commit();

            return $this->sendResponse([
                'conversation' => $conversation->load('users'),
                'avatar_url' => $avatarPath ? asset('storage/' . $avatarPath) : null,
            ], 'Conversation started successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return $this->sendError('Conversation creation failed.', ['error' => $e->getMessage()]);
        }
    }

    public function searchConversations(Request $request)
    {
        $term = $request->input('q');

        $user = Auth::user();

        $conversations = Conversation::whereHas('users', function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })
            ->whereHas('users', function ($q) use ($term) {
                $q->where('name', 'like', '%' . $term . '%');
            })
            ->with(['users' => fn($q) => $q->select('users.id', 'users.name')])
            ->get();

        return response()->json($conversations);
    }

    public function updateChatName(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        if (!$conversation->is_group) {
            return $this->sendError('Cannot update name of private chat');
        }

        $conversation->update([
            'name' => $request->name
        ]);

        return $this->sendResponse($conversation->fresh(), 'Chat name updated successfully');
    }

    public function updateChatAvatar(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        $validator = \Validator::make($request->all(), [
            'avatar' => 'required|image|max:2048',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        if (!$conversation->is_group) {
            return $this->sendError('Cannot update avatar of private chat');
        }

        // Delete old avatar if exists
        if ($conversation->avatar) {
            \Storage::disk('public')->delete($conversation->avatar);
        }

        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        
        $conversation->update([
            'avatar' => $avatarPath
        ]);

        return $this->sendResponse([
            'conversation' => $conversation->fresh(),
            'avatar_url' => asset('storage/' . $avatarPath)
        ], 'Chat avatar updated successfully');
    }

    public function addGroupMembers(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        $validator = \Validator::make($request->all(), [
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:clients,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        if (!$conversation->is_group) {
            return $this->sendError('Cannot add members to private chat');
        }

        // Check if user is already in the conversation
        $existingUserIds = $conversation->users()->pluck('users.id')->toArray();
        $newUserIds = array_diff($request->user_ids, $existingUserIds);

        if (empty($newUserIds)) {
            return $this->sendError('All users are already members of this group');
        }

        $conversation->users()->attach($newUserIds);

        return $this->sendResponse(
            $conversation->fresh()->load('users'),
            'Members added successfully'
        );
    }

    public function removeGroupMembers(Request $request, $id)
    {
        $conversation = Conversation::findOrFail($id);
        $this->authorizeUserInConversation($conversation);

        $validator = \Validator::make($request->all(), [
            'user_ids' => 'required|array|min:1',
            'user_ids.*' => 'exists:clients,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        if (!$conversation->is_group) {
            return $this->sendError('Cannot remove members from private chat');
        }

        // Prevent removing the creator of the group
        if (in_array($conversation->created_by, $request->user_ids)) {
            return $this->sendError('Cannot remove the group creator');
        }

        // Prevent removing yourself
        if (in_array(Auth::id(), $request->user_ids)) {
            return $this->sendError('Cannot remove yourself from the group');
        }

        // Get existing members
        $existingUserIds = $conversation->users()->pluck('users.id')->toArray();
        $usersToRemove = array_intersect($request->user_ids, $existingUserIds);

        if (empty($usersToRemove)) {
            return $this->sendError('None of the specified users are members of this group');
        }

        // Ensure at least one member remains in the group
        if (count($existingUserIds) - count($usersToRemove) < 1) {
            return $this->sendError('Cannot remove all members from the group');
        }

        $conversation->users()->detach($usersToRemove);

        return $this->sendResponse(
            $conversation->fresh()->load('users'),
            'Members removed successfully'
        );
    }
    
}

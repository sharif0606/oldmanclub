<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Post;
use App\Models\User\PostFile;
use App\Models\User\PostReport;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
class PostController extends BaseController
{
    public function user_posts(){
        $posts = Post::with('files')->where('client_id', Auth::user()->id)->get();
        return $this->sendResponse($posts, 'Posts fetched successfully');
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'message' => 'required|string',
            'privacy_mode' => 'required|in:public,friends,private',
            'files.*' => 'nullable|file|max:10240', // Max 10MB per file
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        // Normalize line breaks
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));

        $post = Post::create([
            'client_id' => Auth::user()->id,
            'message' => $content,
            'privacy_mode' => $request->privacy_mode,
        ]);

        // Handle multiple files if present
        if($post){
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                $fileDetails = [];
                
                foreach ($files as $file) {
                     $this->handleFileUpload($file,$post->id);
                }
            }
        }

        return $this->sendResponse($post->load('files'), 'Post created successfully');
    }

    private function handleFileUpload($file, $postId)
    {
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getMimeType();
        $filefolder = date('Y') . '/' . date('m');
        $fileName = rand(1111, 9999) . Auth::user()->id . '_' . rand(111, 999) . time() . '.' . $extension;

        // Determine file type and directory
        if (str_starts_with($mimeType, 'image/')) {
            $directory = 'images';
            $fileType = 'image';
        } elseif (str_starts_with($mimeType, 'video/')) {
            $directory = 'videos';
            $fileType = 'video';
        } else {
            return null; // Skip unsupported file types
        }

        // Create directory if it doesn't exist
        $uploadPath = public_path('uploads/post/' . $directory . '/' . $filefolder);
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Move file to appropriate directory
        $file->move($uploadPath, $fileName);
        
        // Get file size after moving
        $fullPath = $uploadPath . '/' . $fileName;
        $fileSize = file_exists($fullPath) ? filesize($fullPath) : 0;

        $postFile = PostFile::create([
            'post_id' => $postId,
            'file_name' => $fileName,
            'file_type' => $fileType,
            'file_size' => $fileSize,
            'file_path' => $directory . '/' . $filefolder . '/' . $fileName
        ]);
        return $postFile;
    }

    /**
     * Update the image post
     */
    public function post_update_image(Request $request, $id){
        $post = Post::where('client_id', Auth::user()->id)->findOrFail($id);
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $fileName = pathinfo($post->image, PATHINFO_FILENAME);

            // Determine if the file is an image or video
            if (str_starts_with($mimeType, 'image/')) {
                $directory = 'images';
                $fileType = 'image';
                $file->move(public_path('uploads/post'), $fileName);
            } elseif (str_starts_with($mimeType, 'video/')) {
                $directory = 'videos';
                $fileType = 'video';
                $file->move(public_path('uploads/post/' . $directory), $fileName);
            } else {
                return $this->sendError('Unauthorised.', ['error'=>'Invalid file type']);
            }
        }
    
        // Normalize line breaks before updating the content
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
        $post->message = $content;
        $post->updated_at = Carbon::now();
        $post->privacy_mode = $request->privacy_mode;
        $post->save();
    
        return response()->json($post);
    }
    /**
     * Update the video post
     */
    public function post_update_video(Request $request, $id){
        $post = Post::findOrFail($id);
    
        // Handle image upload if present
        if ($request->hasFile('image')) {
            $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/post'), $imageName);
            $post->image = $imageName;
        }
    
        // Normalize line breaks before updating the content
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
        $post->message = $content;
        $post->updated_at = Carbon::now();
        $post->privacy_mode = $request->privacy_mode;
        $post->save();
    
        return response()->json($post);
    }
    public function privacy(Request $request){
        $post = Post::findOrFail($request->postId);
        $post->privacy_mode = $request->privacy_mode;
        $post->save();
        return response()->json([
            'commentHtml' => view('user.partials.privacy', compact('post'))->render(),
        ], 201);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    
        return response()->json(['message' => 'Post deleted successfully.']);
    }
}

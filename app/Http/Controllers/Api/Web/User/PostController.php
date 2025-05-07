<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Post;
use App\Models\User\PostFile;
use App\Models\User\PostReport;
use App\Models\User\PostReaction;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
class PostController extends BaseController
{

    public function index($limit = 20)
    {
        $post = Post::with('files','client','latestComment','singleReaction','multipleReactionCounts')->orderBy('created_at', 'desc')->paginate($limit);
        return $this->sendResponse($post, 'Posts fetched successfully');
    }

    public function user_posts(){
        $posts = Post::with('files','comments')->where('client_id', Auth::user()->id)->get();
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
    public function post_update(Request $request, $id){
        $post = Post::where('client_id', Auth::user()->id)->findOrFail($id);
        
        // Normalize line breaks before updating the content
        $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
        $post->message = $content;
        $post->updated_at = Carbon::now();
        $post->privacy_mode = $request->privacy_mode;
        $post->save();

        if($request->removefiles){
            $files = explode(',',$request->removefiles);
            foreach($files as $file){
                $postFile = PostFile::where('post_id',$post->id)->where('id',$file)->first();
                if($postFile){
                    if(file_exists(public_path('uploads/post/'.$postFile->file_path))){
                        unlink(public_path('uploads/post/'.$postFile->file_path));
                    }
                    $postFile->delete();
                }
            }
        }

        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file){
                $this->handleFileUpload($file,$post->id);
            }
        }
    
        return $this->sendResponse($post->load('files'), 'Post updated successfully');
    }
   
    public function privacy(Request $request,$id){
        $post = Post::where('client_id', Auth::user()->id)->where('id',$id)->first();
        $post->privacy_mode = $request->privacy_mode;
        $post->save();
        return $this->sendResponse($post->load('files'), 'Post privacy updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::where('client_id', Auth::user()->id)->where('id',$id)->first();
        if($post){
            $files = PostFile::where('post_id',$id)->get();
            foreach($files as $file){
                if(file_exists(public_path('uploads/post/'.$file->file_path))){
                    unlink(public_path('uploads/post/'.$file->file_path));
                }
                $file->delete();
            }
            $post->delete();
        }
    
        return $this->sendResponse([], 'Post deleted successfully');
    }

    public function post_reaction(Request $request){
        $existingReaction = PostReaction::where('post_id', $request->post_id)
            ->where('client_id', Auth::user()->id)
            ->first();

        if($existingReaction){
            $post_reaction = $existingReaction;
            $post_reaction->updated_at = Carbon::now();
        }else{
            $post_reaction = new PostReaction();
            $post_reaction->post_id = $request->post_id;
            $post_reaction->client_id = Auth::user()->id;
        }
        $post_reaction->type = $request->reaction_type;
        $post_reaction->save();

        return $this->sendResponse($post_reaction, 'Post reaction updated successfully');
    }
}

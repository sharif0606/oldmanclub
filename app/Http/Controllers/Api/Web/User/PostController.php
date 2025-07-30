<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Post;
use App\Models\User\PostFile;
use App\Models\User\PostReport;
use App\Models\User\PostReaction;
use App\Http\Controllers\Api\BaseController;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\PostBackground;

class PostController extends BaseController
{
    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }

    public function index(Request $request,$limit = 20)
    {
        $post = Post::with('files','client','latestComment','singleReaction','multipleReactionCounts','shared_post');
        if($request->has('search')){
            $post->where('message','like','%'.$request->search.'%');
        }
        $post = $post->orderBy('created_at', 'desc')->paginate($limit);
        return $this->sendResponse($post, 'Posts fetched successfully');
    }

    public function post_background(){
        $post_background = PostBackground::with('category')->where('status',1)->get();
        return $this->sendResponse($post_background, 'Post background fetched successfully');
    }

    public function user_posts(){
        $posts = Post::with('files','comments')->where('client_id', Auth::user()->id)->get();
        return $this->sendResponse($posts, 'Posts fetched successfully');
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'privacy_mode' => 'required|in:public,friends,private',
            'files.*' => 'nullable|file|max:100000', // Max 100MB per file
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        // Normalize line breaks and remove HTML tags
        $content = strip_tags(preg_replace('/\R{2,}/', "\n", $request->input('message')));

        $post = Post::create([
            'client_id' => Auth::user()->id,
            'message' => $content,
            'privacy_mode' => $request->privacy_mode,
            'background_url' => $request->background_url,
        ]);

        // Handle multiple files if present
        if($post && $request->hasFile('files')) {
            $files = $request->file('files');
            
            foreach ($files as $file) {
                try {
                    $this->fileUploadService->uploadPostFile($file, $post->id);
                } catch (Exception $e) {
                    // Log error and continue with other files
                    \Log::error('File upload failed: ' . $e->getMessage());
                }
            }
        }

        return $this->sendResponse($post->load('files'), 'Post created successfully');
    }

    public function post_update(Request $request, $id){
        $post = Post::where('client_id', Auth::user()->id)->findOrFail($id);
        
        // Normalize line breaks and remove HTML tags before updating the content
        $content = strip_tags(preg_replace('/\R{2,}/', "\n", $request->input('message')));
        $post->message = $content;
        $post->updated_at = Carbon::now();
        $post->privacy_mode = $request->privacy_mode;
        if($request->background_url){
            $post->background_url = $request->background_url;
        }
        $post->save();

        if($request->removefiles){
            $files = explode(',',$request->removefiles);
            foreach($files as $file){
                $postFile = PostFile::where('post_id',$post->id)->where('id',$file)->first();
                if($postFile){
                    $this->fileUploadService->deleteFile($postFile->file_path);
                    $postFile->delete();
                }
            }
        }

        if($request->hasFile('files')){
            $files = $request->file('files');
            foreach($files as $file){
                try {
                    $this->fileUploadService->uploadPostFile($file, $post->id);
                } catch (Exception $e) {
                    \Log::error('File upload failed: ' . $e->getMessage());
                }
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
                $this->fileUploadService->deleteFile($file->file_path);
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

    public function post_reaction_delete(Request $request){
        $request->validate(['post_id' => 'required|exists:posts,id']);
        $existingReaction = PostReaction::where('post_id', $request->post_id)
            ->where('client_id', Auth::user()->id)
            ->first();
        if($existingReaction){
            $existingReaction->delete();
        }
        return $this->sendResponse([], 'Post reaction deleted successfully');
    }

    public function post_share(Request $request){
        $post = Post::where('id',$request->post_id)->first();
        $post->share_count = $post->share_count + 1;
        $post->save();

        $post_share = new Post();
        $post_share->client_id = Auth::user()->id;
        $post_share->message = $request->message ?? $post->message;
        $post_share->privacy_mode = $request->privacy_mode ?? $post->privacy_mode;
        $post_share->shared_from = $post->id;
        $post_share->background_url = $post->background_url;
        $post_share->save();

        $post_share_file = PostFile::where('post_id',$post->id)->get();
        foreach($post_share_file as $file){
        $post_share_file = PostFile::create([
            'post_id' => $post_share->id,
            'file_type' => $file->file_type,
            'file_path' => $file->file_path,
            'file_name' => $file->file_name,
            'file_size' => $file->file_size,
            ]);
        }
        return $this->sendResponse($post, 'Post shared successfully'); 
    }
}

<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Models\User\Post;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
class PostController extends BaseController
{
    public function store(Request $request)
    {
        try{
            $fileName = '';
            $filefolder=date('Y').'/'.date('m');
            $fileType = ''; // To store the type of the file (image or video)

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $mimeType = $file->getMimeType();
                $fileName = rand(1111,9999).Auth::user()->id.'_'.rand(111, 999) . time() . '.' . $extension;

                // Determine if the file is an image or video
                if (str_starts_with($mimeType, 'image/')) {
                    $directory = 'images';
                    $fileType = 'image';
                    $file->move(public_path('uploads/post/'.$directory.'/'.$filefolder), $fileName);
                } elseif (str_starts_with($mimeType, 'video/')) {
                    $directory = 'videos';
                    $fileType = 'video';
                    $file->move(public_path('uploads/post/'.$directory.'/'.$filefolder), $fileName);
                } else {
                    return $this->sendError('Unauthorised.', ['error'=>'Invalid file type']);
                }
            }
        
            // Normalize line breaks before storing the content
            $content = preg_replace('/\R{2,}/', "\n", $request->input('message'));
            // create db entry
            $post = Post::create([
                'message' => $content,
                'image'=>$filefolder.'/'.$fileName,
                'post_type' => $fileType, // Store the file type
                'client_id' => Auth::user()->id,
                'privacy_mode' => $request->privacy_mode?$request->privacy_mode:'public'
            ]);
            return $this->sendResponse([
                'post' => $post
            ], 'Post Created Successfully');
        } catch (Exception $e) {
            return $this->sendError('Unauthorised.', ['error'=>'An error occurred']);
        }
    }

    /**
     * Update the image post
     */
    public function post_update_image(Request $request, $id){
        $post = Post::findOrFail($id);
        return $post;
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

<?php

namespace App\Http\Controllers\Api\Web\User;

use App\Http\Controllers\Api\BaseController;
use App\Models\User\Client;
use App\Models\User\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FollowController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     */
    public function follow(Request $request)
    {
        $current_user_id=Auth::user()->id;
        $check=Follow::where('follower_id',$current_user_id)->where('following_id',$request->following_id)->first();
        if($check){
            return $this->sendError('Already followed');
        }
       
        $follow = New Follow;
        $follow->follower_id =$current_user_id;
        $follow->following_id =  $request->following_id;
        $follow->save();
        
        return $this->sendResponse($follow, 'Followed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function unfollow(Request $request)
    {
        $follow = Follow::where('follower_id',Auth::user()->id)->where('following_id',$request->following_id)->first();
        if ($follow) {
            $follow->delete(); // Soft delete the follow record
            return $this->sendResponse($follow, 'Unfollowed successfully.');
        } else {
            return $this->sendError('Unauthorized action.');
        }
    }
}

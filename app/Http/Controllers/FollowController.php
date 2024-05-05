<?php

namespace App\Http\Controllers;

use App\Models\User\Client;
use App\Models\User\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->username){
            $client = Client::where('username', 'like', "$request->username")->first();
            if(Follow::where('follower_id',$client->id)->where('following_id',currentUserId())->exists()){
                return redirect()->back();
            }else{
                $follow = New Follow;
                $follow->follower_id = $client->id;
                $follow->following_id = currentUserId();
                $follow->save();
            }
        }else{
            $follow = New Follow;
            $follow->follower_id = $request->follower_id;
            $follow->following_id = currentUserId();
            $follow->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Follow $follow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follow $follow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follow $follow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follow $follow)
    {
        if ($follow->following_id == currentUserId()) {
            $follow->delete(); // Soft delete the follow record
            return redirect()->back()->with('success', 'Unfollowed successfully.');
        } else {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Models\User\PhoneGroup;
use App\Models\User\PhoneBook;
use App\Models\User\Client;
use App\Models\User\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhoneGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->orderBy('group_name')->get();
        $postCount = Post::where('client_id', currentUserId())->count();
        $contactbygroup=[];
        foreach($phonegroup as $group){
            $count = PhoneBook::where('group_id',$group->id)->count();
            $contactbygroup[$group->id]=$count;
        }
        $phone = PhoneBook::where('group_id')->count();
        return view('user.phonegroup.index',compact('phonegroup','client','contactbygroup','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postCount = Post::where('client_id', currentUserId())->count();
        $client = Client::find(currentUserId());
        return view('user.phonegroup.create',compact('client','postCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $phonegroup = new PhoneGroup;
            $phonegroup->client_id = currentUserId();
            $phonegroup->group_name = $request->group_name;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/phonegroup'), $imageName);
                $phonegroup->image = $imageName;
            }
            if($phonegroup->save()){
                $this->notice::success('Phone Group Successfully Saved');
                return redirect()->route('phonegroup.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postCount = Post::where('client_id', currentUserId())->count();
        $data = PhoneGroup::where('client_id',currentUserId())->get();
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->get();
        $contactbygroup=[];
        foreach($phonegroup as $group){
            $count = PhoneBook::where('group_id',$group->id)->count();
            $contactbygroup[$group->id]=$count;
        }
        $phonegroup = PhoneGroup::findOrFail(encryptor('decrypt',$id));
        $phonebook = PhoneBook::where('group_id',$phonegroup->id)->get();
        return view('user.phonegroup.show',compact('phonegroup','client','data','postCount','contactbygroup','phonebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $postCount = Post::where('client_id', currentUserId())->count();
        $data = PhoneGroup::where('client_id',currentUserId())->get();
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::findOrFail(encryptor('decrypt',$id));
        return view('user.phonegroup.edit',compact('phonegroup','client','data','postCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $phonegroup = PhoneGroup::findOrFail(encryptor('decrypt',$id));
            $phonegroup->client_id = currentUserId();
            $phonegroup->group_name = $request->group_name;
            if ($request->hasFile('image')) {
                $imageName = rand(111, 999) . time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads/phonegroup'), $imageName);
                $phonegroup->image = $imageName;
            }
            if($phonegroup->save()){
                $this->notice::success('Phone Group Successfully Updated');
                return redirect()->route('phonegroup.index');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Please try again');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $phonegroup = PhoneGroup::findOrFail(encryptor('decrypt',$id));
        if($phonegroup->delete()){
            $this->notice::warning('Data Deleted!');
            return redirect()->back();
        }
    }
}

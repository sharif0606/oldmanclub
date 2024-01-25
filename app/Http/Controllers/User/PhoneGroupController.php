<?php

namespace App\Http\Controllers\User;

use App\Models\User\PhoneGroup;
use App\Models\User\Client;
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
        $phonegroup = PhoneGroup::where('client_id',currentUserId())->get();
        return view('user.phonegroup.index',compact('phonegroup','client'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.phonegroup.create');
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
    public function show(PhoneGroup $phoneGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = Client::find(currentUserId());
        $phonegroup = PhoneGroup::findOrFail(encryptor('decrypt',$id));
        return view('user.phonegroup.edit',compact('phonegroup','client'));
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

<?php

namespace App\Http\Controllers\Backend\Location;

use App\Http\Controllers\Controller;
use App\Models\User\Country;
use App\Models\User\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    //use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=City::all();
        return view('settings.location.City.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.location.City.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $City=new City;
            $City->name=$request->CityName;
            $City->code=$request->CityCode;
            if($City->save())
                return redirect()->route(currentUser().'.City.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $City=City::findOrFail(encryptor('decrypt',$id));
        return view('settings.location.City.edit',compact('City'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $City=City::findOrFail(encryptor('decrypt',$id));
            $City->name=$request->CityName;
            $City->code=$request->CityCode;
            if($City->save())
                return redirect()->route(currentUser().'.City.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $City
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getCitiesByStates(Request $request){
        $cities = City::where('state_id',$request->stateId)->get();
        return response()->json($cities);
    }
}

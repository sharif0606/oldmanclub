<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Models\Settings\Location\City;
use App\Models\Settings\Location\State;
use App\Models\Settings\Location\Country;
use Illuminate\Http\Request;

class LocationController extends BaseController
{
    public function cities(Request $request){
        $cities = City::orderBy('name','asc')
        ->when($request->has('state_id'),function($query) use ($request){
            $query->where('state_id',$request->state_id);
        })
        ->get();
        return $this->sendResponse($cities,'Cities fetched successfully');
    }

    public function states(Request $request){
        $states = State::orderBy('name','asc')
        ->when($request->has('country_id'),function($query) use ($request){
            $query->where('country_id',$request->country_id);
        })
        ->get();
        return $this->sendResponse($states,'States fetched successfully');
    }

    public function countries(Request $request){
        $countries = Country::orderBy('name','asc')->get();
        return $this->sendResponse($countries,'Countries fetched successfully');
    }
}

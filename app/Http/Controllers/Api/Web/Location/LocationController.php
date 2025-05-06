<?php

namespace App\Http\Controllers\Api\Web\Location;

use App\Http\Controllers\Api\BaseController;

use App\Models\Settings\Location\Country;
use App\Models\Settings\Location\State;
use App\Models\Settings\Location\City;
use App\Models\Settings\Location\Thana;

use Illuminate\Http\Request;

class LocationController extends BaseController
{
    public function country()
    {
        $countries = Country::all();
        return $this->sendResponse($countries, 'Countries fetched successfully');
    }

    public function state(Request $request) //division
    {
        $divisions = State::orderBy('name', 'asc');
        if($request->country_id){
            $divisions = $divisions->where('country_id', $request->country_id);
        }
        $divisions = $divisions->get();
        return $this->sendResponse($divisions, 'state fetched successfully');
    }

    public function city(Request $request) //district
    {
        $cities = City::orderBy('name', 'asc');
        if($request->state_id){
            $cities = $cities->where('state_id', $request->state_id);
        }
        $cities = $cities->get();
        return $this->sendResponse($cities, 'city fetched successfully');
    }
}

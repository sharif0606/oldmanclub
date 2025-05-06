<?php

namespace App\Http\Controllers\Api\Web\Location;

use App\Http\Controllers\Api\BaseController;

use App\Models\Settings\Location\Country;
use App\Models\Settings\Location\Division;
use App\Models\Settings\Location\District;
use App\Models\Settings\Location\Thana;

use Illuminate\Http\Request;

class LocationController extends BaseController
{
    public function country()
    {
        $countries = Country::all();
        return $this->sendResponse($countries, 'Countries fetched successfully');
    }

    public function state() //division
    {
        $divisions = Division::all();
        return $this->sendResponse($divisions, 'state fetched successfully');
    }

    public function city() //district
    {
        $districts = District::all();
        return $this->sendResponse($districts, 'city fetched successfully');
    }
    

    public function area() //thana
    {
        $thanas = Thana::all();
        return $this->sendResponse($thanas, 'area fetched successfully');
    }
}

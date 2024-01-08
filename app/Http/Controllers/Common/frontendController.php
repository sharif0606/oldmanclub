<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Website\Setting;
use App\Models\Backend\Website\Slider;
use App\Models\Backend\Website\OurServices;
use App\Models\Backend\Website\Homepage;
use App\Models\Backend\Website\CustomerFeedback;
use App\Models\Backend\Website\GlobalNetWorkImage;

class frontendController extends Controller
{
    public function frontend(){
        $setting = Setting::first();
        $slider = Slider::get();
        $services = OurServices::get();
        $homepage = Homepage::first();
        $feedback = CustomerFeedback::get();
        $globalnetwork = GlobalNetWorkImage::get();
        return view('frontend.home',compact('setting','slider','services','homepage','feedback','globalnetwork'));
    }
}

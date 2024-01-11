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

use App\Models\Backend\Website\NfcCard\NfcCardImage;
use App\Models\Backend\Website\NfcCard\NfcCardPriceSection;
use App\Models\Backend\Website\NfcCard\NfcCardPrice;
use App\Models\Backend\Website\NfcCard\SubscribeSection;

use App\Models\Backend\Website\ShippingService\Header_section;
use App\Models\Backend\Website\ShippingService\Service_section;
use App\Models\Backend\Website\ShippingService\ChoiceSection;

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

    public function nfccard(){
        $setting = Setting::first();
        $nfccardhero = NfcCardImage::first();
        $lists = is_array($nfccardhero->feature_list) ? $nfccardhero->feature_list : explode(',', $nfccardhero->feature_list);
        $nfcsection = NfcCardPriceSection::first();
        $nfccardprice = NfcCardPrice::get();
        $nfcsubscribe = SubscribeSection::first();
        return view('frontend.nfccard',compact('setting','nfccardhero','lists','nfcsection','nfccardprice','nfcsubscribe'));
    }
    public function shippingservice(){
        $setting = Setting::first();
        $heading = Header_section::first();
        $service = Service_section::get();
        $choice =ChoiceSection::first();
        $featureList = is_array($choice->feature_list)? $choice->feature_list:explode(',',$choice->feature_list);
        return view('frontend.shippingservice',compact('setting','heading','service','choice','featureList'));
    }
}

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
use App\Models\Common\ContactUs;
use Illuminate\Support\Facades\Validator;

// use App\Models\Backend\Website\NfcCard\NfcCardImage;
// use App\Models\Backend\Website\NfcCard\NfcCardPriceSection;
// use App\Models\Backend\Website\NfcCard\NfcCardPrice;
// use App\Models\Backend\Website\NfcCard\SubscribeSection;

// use App\Models\Backend\Website\ShippingService\Header_section;
// use App\Models\Backend\Website\ShippingService\Service_section;
// use App\Models\Backend\Website\ShippingService\ChoiceSection;

use App\Models\Backend\Website\LLcservice\LlcHeroSection;

class frontendController extends Controller
{
    public function frontend(){
        $setting = Setting::first();
        $slider = Slider::get();
        $services = OurServices::take(6)->get();
        // $services = OurServices::get();
        $homepage = Homepage::first();
        $feedback = CustomerFeedback::where('show_hide',1)->get();
        $globalnetwork = GlobalNetWorkImage::get();
        return view('frontend.home',compact('setting','slider','services','homepage','feedback','globalnetwork'));
    }
    public function allservice(){
        $setting = Setting::first();
        $services = OurServices::get();
        return view('frontend.allservice',compact('setting','services'));
    }
    public function nfccard(){
        $setting = Setting::first();
        $nfccardhero = \App\Models\Backend\Website\NfcCard\NfcCardImage::first();
        $lists = is_array($nfccardhero->feature_list) ? $nfccardhero->feature_list : explode(',', $nfccardhero->feature_list);
        $nfcsection = \App\Models\Backend\Website\NfcCard\NfcCardPriceSection::first();
        $nfccardprice = \App\Models\Backend\Website\NfcCard\NfcCardPrice::get();
        $nfcsubscribe = \App\Models\Backend\Website\NfcCard\SubscribeSection::first();
        return view('frontend.nfccard',compact('setting','nfccardhero','lists','nfcsection','nfccardprice','nfcsubscribe'));
    }
    public function shippingservice(){
        $setting = Setting::first();
        $heading = \App\Models\Backend\Website\ShippingService\Header_section::first();
        $service = \App\Models\Backend\Website\ShippingService\Service_section::get();
        $choice = \App\Models\Backend\Website\ShippingService\ChoiceSection::first();
        $featureList = is_array($choice?->feature_list)? $choice->feature_list:explode(',',$choice?->feature_list);
        return view('frontend.shippingservice',compact('setting','heading','service','choice','featureList'));
    }
    public function shipplearnmore(){
        $setting = Setting::first();
        return view('frontend.shipplearnmore',compact('setting'));
    }
    public function llcservice(){
        $setting = \App\Models\Backend\Website\Setting::first();
        $llcherosection = \App\Models\Backend\Website\LLcservice\LlcHeroSection::first();
        $llcservice = \App\Models\Backend\Website\LLcservice\Llcservice::get();
        $llcpricing = \App\Models\Backend\Website\LLcservice\LlcPricing::get();
        $llccardsection = \App\Models\Backend\Website\LLcservice\LlcCardsection::first();
        return view('frontend.llcservice',compact('setting','llcherosection','llcservice','llcpricing','llccardsection'));
    }
    public function phoneservice(){
        $setting = \App\Models\Backend\Website\Setting::first();
        $phonehero = \App\Models\Backend\Website\PhoneService\PhoneNumberHero::first();
        $phoneservice = \App\Models\Backend\Website\PhoneService\PhoneNumberService::first();
        $phonemaps = \App\Models\Backend\Website\PhoneService\PhoneVirtualMaps::first();
        $phonefeedback = \App\Models\Backend\Website\PhoneService\PhoneCustomerFeedback::get();
        return view('frontend.phoneservice',compact('setting','phonehero','phoneservice','phonemaps','phonefeedback'));
    }
    public function smartmailservice(){
        $setting = \App\Models\Backend\Website\Setting::first();
        $smartmailhero = \App\Models\Backend\Website\SmartMail\SmartMailHero::first();
        $smartphonebook = \App\Models\Backend\Website\SmartMail\SmartPhonebookService::first();
        $smartworkservice = \App\Models\Backend\Website\SmartMail\SmartWorkSection::get();
        $smartsmsservice = \App\Models\Backend\Website\SmartMail\SmartSmsService::first();
        return view('frontend.smartmailservice',compact('setting','smartmailhero','smartphonebook','smartworkservice','smartsmsservice'));
    }
    public function printservice(){
        $setting = \App\Models\Backend\Website\Setting::first();
        $printinghero = \App\Models\Backend\Website\PrintingService\PrintingHero::first();
        $printvideo = \App\Models\Backend\Website\PrintingService\PrintVideoSection::first();
        $printfeature = \App\Models\Backend\Website\PrintingService\PrintCardSection::get();
        $printfeedback = \App\Models\Backend\Website\PrintingService\PrintCustomerFeedback::get();
        $printservices = \App\Models\Backend\PrintingService::latest()->take(4)->get();
        return view('frontend.printservice',compact('setting','printinghero','printvideo','printfeature','printfeedback','printservices'));
    }
    public function contact_create(){
        $setting = \App\Models\Backend\Website\Setting::first();
        return view('frontend.contact',compact('setting'));
    }
    public function contact_store(Request $request){
        try{
            $request->validate([
                'name' => 'required|string',
                'contact_no' => 'required|string',
                'email' => 'required|email',
                'message' => 'required|string',
                'file' => 'nullable|mimes:jpeg,jpg,png,pdf,doc,docx|max:2048', // Adjust max file size as needed (2048 KB = 2 MB)
            ]);

            $contact = new ContactUs;
            $contact->name = $request->name;
            $contact->contact_no = $request->contact_no;
            $contact->email = $request->email;
            $contact->message = $request->message;
            if($request->hasFile('file')){
                $imageName = rand(111,999).time().'.'.$request->file->extension();
                $request->file->move(public_path('uploads/contact_file'), $imageName);
                $contact->file=$imageName;
            }
            if($contact->save()){
                $this->notice::success('Message Successfully Send');
                return redirect()->route('contact_create');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something Wrong! Please try again');
            return redirect()->route('contact_create');
        }
    }
}

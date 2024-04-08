<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Common\ContactUs;
use Illuminate\Http\Request;

class ContactUserController extends Controller
{
    public function contact_list(){
        $data = ContactUs::get();
        return view('backend.contact_list.index',compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Toastr;
class TestController extends Controller
{
    public function index()
    {
        \Mail::send('mail.reply_body', [], function ($message) {
            $message->from('noreply@muktomart.com.bd', 'Old Man Club')
                ->to('tawhid102@gmail.com')/*dev@icarjapan.com*/
                ->subject('Test');
        });
    }
}

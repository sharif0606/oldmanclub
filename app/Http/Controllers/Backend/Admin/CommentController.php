<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ShippingComment;
use App\Models\User\Shipping;
use App\Models\User\Client;

class CommentController extends Controller
{
    public function comment_list(){
        $shipping = Shipping::get();
        $comment = ShippingComment::get();
        return view('Backend.comments.index',compact('comment','shipping'));
    }
    public function comment_edit($id){
        $comment = ShippingComment::findOrFail(encryptor('decrypt',$id));
        return view('Backend.comments.edit',compact('comment'));
    }
    public function comment_update(Request $request,$id){
        try{
            $comment = ShippingComment::findOrFail(encryptor('decrypt',$id));
            $comment->user_message = $request->user_message;
            if($comment->save()){
                $this->notice::success('Shipping Successfully saved');
                return redirect()->route('comment_list');
            }
        }catch(Exception $e){
            dd($e);
            $this->notice::error('Something wrong! Please try again');
            return redirect()->back()->withInput();
        }
    }

}

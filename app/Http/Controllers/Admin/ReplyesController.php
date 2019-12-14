<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Reply;
use Illuminate\Http\Request;

class ReplyesController extends Controller
{

    public function replyStore(Request $reauest){
    	
    	$this->validate($reauest,[
    		'comment_id' => 'required',
    		'user_id' => 'required',
    		'reply' =>'required',
    	]);


    	$reply = new Reply();
    	$reply->comment_id = $reauest->comment_id;
    	$reply->user_id = $reauest->user_id;
    	$reply->reply = $reauest->reply;
    	$reply->save();
    	return redirect()->back();
    }
}

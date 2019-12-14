<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function commentStore(Request $reauest){
    	$this->validate($reauest,[
    		'content_id' => 'required',
    		'user_id' => 'required',
    		'comment' =>'required',
    	]);


    	$comment = new Comment();
    	$comment->content_id = $reauest->content_id;
    	$comment->user_id = $reauest->user_id;
    	$comment->comment = $reauest->comment;
    	$comment->save();
    	return redirect()->back();

    }
}

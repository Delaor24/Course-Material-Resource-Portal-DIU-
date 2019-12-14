<?php

namespace App\Model\Admin;

use App\Model\Admin\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function comment(){
    	return $this->belongsTo(Comment::class);
    }
      public function user(){
    	return $this->belongsTo(User::class);
    }
}

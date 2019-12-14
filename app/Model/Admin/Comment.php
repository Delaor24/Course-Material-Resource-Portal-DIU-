<?php

namespace App\Model\Admin;

use App\Model\Admin\Reply;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function replies(){
    	return $this->hasMany(Reply::class);
    }
    public function user(){
    	return $this->belongsTo(User::class);
    }
}

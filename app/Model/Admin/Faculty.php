<?php

namespace App\Model\Admin;

use App\Model\Admin\Department;
use App\Model\Admin\TeacherAssign;
use Illuminate\Database\Eloquent\Model;
class Faculty extends Model
{
    protected $fillable = ['facultyName'];

     public function departments(){
    	return $this->hasMany(Department::class);
    }
     public function teacherAssigns(){
    	return $this->hasMany(TeacherAssign::class);
    }
}

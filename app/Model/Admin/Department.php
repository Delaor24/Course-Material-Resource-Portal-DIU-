<?php

namespace App\Model\Admin;

use App\Model\Admin\Faculty;
use App\Model\Admin\Program;
use App\Model\Admin\TeacherAssign;
use Illuminate\Database\Eloquent\Model;
class Department extends Model
{
    protected $fillable = ['faculty_id','departmentName'];

    public function faculty(){
    	return $this->belongsTo(Faculty::class);
    }

    public function programs(){
    	return $this->hasMany(Program::class);
    }
    public function teacherAssigns(){
    	return $this->hasMany(TeacherAssign::class);
    }
}

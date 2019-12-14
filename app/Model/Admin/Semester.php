<?php

namespace App\Model\Admin;

use App\Model\Admin\Course;
use App\Model\Admin\Program;
use App\Model\Admin\TeacherAssign;
use Illuminate\Database\Eloquent\Model;
class Semester extends Model
{
    protected $fillable = ['program_id','semesterName'];
    public function program(){
    	return $this->belongsTo(Program::class);
    }
    public function courses(){
    	return $this->hasMany(Course::class);
    }

    public function teacherAssigns(){
    	return $this->hasMany(TeacherAssign::class);
    }
}

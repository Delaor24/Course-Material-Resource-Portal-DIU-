<?php

namespace App\Model\Admin;

use App\Model\Admin\Semester;
use App\Model\Admin\TeacherAssign;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{
    protected $fillable = ['semester_id','courseName','courseCode'];

    public function semester(){
    	return $this->belongsTo(Semester::class);
    }

    public function teacherAssigns(){
    	return $this->hasMany(TeacherAssign::class);
    }

    
}

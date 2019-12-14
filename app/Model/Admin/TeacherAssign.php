<?php

namespace App\Model\Admin;

use App\Model\Admin\Course;
use App\Model\Admin\Department;
use App\Model\Admin\Faculty;
use App\Model\Admin\Program;
use App\Model\Admin\Semester;
use App\Model\Teacher\Teacher;
use Illuminate\Database\Eloquent\Model;

class TeacherAssign extends Model
{
    public function teacher(){
    	return $this->belongsTo(Teacher::class);
    }

    public function department(){
    	return $this->belongsTo(Department::class);
    }

    public function program(){
    	return $this->belongsTo(Program::class);
    }

    public function semester(){
    	return $this->belongsTo(Semester::class);
    }
    public function course(){
    	return $this->belongsTo(Course::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}

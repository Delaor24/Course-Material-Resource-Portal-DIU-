<?php

namespace App\Model\Admin;

use App\Model\Admin\Department;
use App\Model\Admin\Semester;
use App\Model\Admin\TeacherAssign;
use Illuminate\Database\Eloquent\Model;
class Program extends Model
{
    protected $fillable = ['department_id','programName'];

    
    
    public function semesters(){
    	return $this->hasMany(Semester::class);
    }

    public function teacherAssigns(){
    	return $this->hasMany(TeacherAssign::class);
    }
}

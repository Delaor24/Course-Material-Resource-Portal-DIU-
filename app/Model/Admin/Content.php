<?php

namespace App\Model\Admin;

use App\Model\Admin\Comment;
use App\Model\Admin\Course;
use App\Model\Admin\Department;
use App\Model\Admin\Faculty;
use App\Model\Admin\File;
use App\Model\Admin\Program;
use App\Model\Admin\Semester;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['faculty_id','department_id','program_id','semester_id','course_id','title','description','file'];

    public function files(){
    	return $this->hasMany(File::class);
    }

    public function faculty(){
    	return $this->belongsTo(Faculty::class);
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
      public function comments(){
        return $this->hasMany(Comment::class);
    }



    
}

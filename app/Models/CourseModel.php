<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    
    public static function getCoursesByUserId($id){
        return self::where('teacher_id', $id)->get();
    }
}

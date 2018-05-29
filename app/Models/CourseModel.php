<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    
    public static function getCoursesByTeacherId($id)
    {
        return self::where('teacher_id', $id)->get();
    }

    public static function getCourseById($id)
    {
        return self::where('id', $id)->first();
    }
}

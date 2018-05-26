<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTakeCourseModel extends Model
{
    protected $table = 'student_take_course';

    public static function getTakeCourseList($studentId){
        return self::where('student_id', $studentId)->get();
    }

    public static function getStudentList($courseId){
        return self::where('course_id', $courseId)->get();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;

class RoomController extends Controller
{
    public function getCourse(Request $request)
    {
        $rtn = array();
        $course_id = $request->input('course_id');
        $course = RoomModel::getCourseById($course_id);
        
        if (!$room) {
            $rtn['errmsg'] = 'course not found!';
        } else {
            $rtn['result'] = $course;
        }

        return $rtn;
    }
}

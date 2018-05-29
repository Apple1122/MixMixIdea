<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\RoomModel;
use App\Models\StudentTakeCourseModel;
use Session;

class CourseController extends Controller
{
    public function getUserCourses()
    {
        $userData = Session::all();
        $rtn = array();
        $courses = array();
        if ($userData['loginAs'] === 'teacher') {
            $courses = CourseModel::getCoursesByTeacherId($userData['uid']);
        } elseif ($userData['loginAs'] === 'student') {
            $courseList = StudentTakeCourseModel::getTakeCourseList($userData['uid']);
            foreach ($courseList as $cl) {
                $course = CourseModel::getCourseById($cl['course_id']);
                if ($course) {
                    array_push($courses, $course);
                }
            }
        }
        if ($courses) {
            $rtn['result'] = $courses;
        } else {
            $rtn['errmsg'] = "Have no any course!";
        }

        return $rtn;
    }

    public function createRoom(Request $request)
    {
        $rtn = array();
        $course_id = $request->input('course_id');
        $room = RoomModel::createRoom($course_id);
        
        if ($room) {
            $rtn['errmsg'] = 'room is already existed';
        } else {
            $rtn['result'] = $room;
        }

        return $rtn;
    }
}

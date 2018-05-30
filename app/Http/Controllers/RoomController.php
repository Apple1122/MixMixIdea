<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;
use App\Models\RoomModel;

class RoomController extends Controller
{

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

    public function leaveRoom(Request $request)
    {
        $rtn = array();
        $course_id = $request->input('course_id');
        $room = RoomModel::closeRoom($course_id);
        
        if ($room->status !== "close") {
            $rtn['errmsg'] = 'close failed';
        }

        return $rtn;
    }

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

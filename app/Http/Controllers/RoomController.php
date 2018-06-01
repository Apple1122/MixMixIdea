<?php

namespace App\Http\Controllers;

use App\Models\RoomModel;
use App\Models\RoomPlayersModel;
use Illuminate\Http\Request;
use Session;

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
        $room = RoomModel::changeStatus($course_id, "close");
        
        if (isset($room)) {
            if ($room->status !== "close") {
                $rtn['errmsg'] = 'close failed';
            }
        }

        return $rtn;
    }

    public function gameStart(Request $request)
    {
        $rtn = array();
        $course_id = $request->input('course_id');
        $room = RoomModel::changeStatus($course_id, "playing");

        if (isset($room)) {
            if ($room->status !== "playing") {
                $rtn['errmsg'] = 'play failed';
            }
        }

        return $rtn;
    }

    public function joinRoom(Request $request)
    {
        $rtn = array();
        $course_id = $request->input('course_id');
        $student_id = Session::get('uid');

        $player = RoomPlayersModel::addPlayer($course_id, $student_id);

        if ($player == null) {
            $rtn['errmsg'] = 'join failed';
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

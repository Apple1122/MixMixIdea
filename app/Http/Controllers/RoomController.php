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
        $qroom = RoomModel::changeStatus($course_id, "close");
        
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
        $mode = json_encode($request->input('mode'));
        
        $queryRoom = RoomModel::getRoom($course_id);
        if ($queryRoom != null) {
            $queryRoom->mode = $mode;
            $queryRoom->status = "playing";
            $queryRoom->save();
        } else {
            $rtn['errmsg'] = 'play failed';
        }$rtn['errmsg'] =$mode;
        return $mode;
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

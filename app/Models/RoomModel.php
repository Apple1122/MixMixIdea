<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = 'room';
    protected $guarded  = ['id'];

    public static function createRoom($course_id)
    {
        $queryRoom = self::where('course_id', $course_id)
        ->where('status', "waiting")
        ->first();

        if ($queryRoom == null) {
            $room = new RoomModel();
            $room->course_id = $course_id;
            $room->status = "waiting";
            $room->created_at = \Carbon\Carbon::now();
            $room->updated_at = \Carbon\Carbon::now();
            $room->save();
        }
        return $queryRoom;
    }

    public static function changeStatus($course_id, $status){
        $queryRoom = self::where('course_id', $course_id)
        ->where("status","<>", "close")
        ->first();

        if ($queryRoom != null) {
            $queryRoom->status = $status;
            $queryRoom->save();
        }
        return $queryRoom;
    }

    public static function getRoom($course_id)
    {
        $room = self::where('course_id', $course_id)
        ->where('status', "waiting")
        ->first();

        return $room;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $table = 'room';
    protected $guarded  = ['id'];

    public static function createRoom($course_id)
    {
        $queueRoom = self::where('course_id', $course_id)
        ->where('status', "waiting")
        ->first();
        
        if ($queueRoom == null) {
            $room = new RoomModel();
            $room->course_id = $course_id;
            $room->status = "waiting";
            $room->created_at = \Carbon\Carbon::now();
            $room->updated_at = \Carbon\Carbon::now();
            $room->save();
        }
        return $queueRoom;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomModel;

class RoomPlayersModel extends Model
{
    protected $table = 'room_players';
    protected $guarded  = ['id'];

    public static function addPlayer($course_id, $student_id){
        $queryRoom = RoomModel::where('course_id', $course_id)
        ->where('status', "playing")
        ->first();

        $player = new RoomPlayersModel();
        $player->room_id = $queryRoom->id;
        $player->student_id = $student_id;
        $player->created_at = \Carbon\Carbon::now();
        $player->updated_at = \Carbon\Carbon::now();
        $player->save();
    
        return $player;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';

    public static function getTeacherById($teacher_id){
        return self::where('teacher_id', $teacher_id)->first();
    }

    public static function getAccount($account, $password){
        $user = self::where('account', $account)->first();
        
        if(!$user) return null;
        if (password_verify($password, $user->password)) {
            return $user;
        } else{
            return null;
        }      
    }
}

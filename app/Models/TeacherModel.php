<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherModel extends Model
{
    protected $table = 'teachers';

    public static function getTeacherById($id){
        return self::where('teacher_id', $id)->first();
    }

    public static function isAccountCorrect($account, $password){
        $user = self::where('account', 'yuweiwei')->first();
        
        if(!$user) return null;
        if (password_verify('1234', $user->password)) {

            return $user;
        } else{
            return null;
        }
            
        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'students';
    
        public static function getStudentById($student_id){
            return self::where('student_id', $student_id)->first();
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

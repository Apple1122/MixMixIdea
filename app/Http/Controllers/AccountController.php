<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\TeacherModel;

class AccountController extends Controller
{
    function login(Request $request)
    {     
        $data = null;
        $rtn = array();
        $user = $request->all();

       if($user['loginType'] === "teacher"){
            $teacher = TeacherModel::getAccount($user['account'], $user['password']);

            if($teacher){
                Session::put('loginAs', "teacher");
                Session::put('uid', $teacher->teacher_id);
                Session::put('name', $teacher->name);

                $data['loginAs'] = 'teacher';
                $data['username'] = $teacher->name;
            } else{
                $rtn['errmsg'] = "User not found!";
            }
        }  

        $rtn['result'] = $data;
        return $rtn;
    }
}

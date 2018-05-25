<?php

namespace App\Http\Controllers;

use Session;
use App\Models\TeacherModel;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function test()
    {
        $rtn = array(
            'errcode' => '',
            'errmsg' => '',
            'result' => 'ok',
        );
        return $rtn;
    }


    function login(Request $request)
    {
        $rtn = array(
            'errcode' => '',
            'errmsg' => '',
            'result' => '',
        );

        $user = $request->all();
        $isLogin = false;

       if($user['loginType'] === "teacher"){
            $teacher = TeacherModel::isAccountCorrect($user['account'], $user['password']);
            if($teacher){
                Session::put('loginAs', "teacher");
                Session::put('uid', $teacher->teacher_id);
                Session::put('name', $teacher->name);
                $isLogin = true;
            }
        }

        $rtn['result'] = $isLogin
            ? 'login OK!'       
            : 'login failed!';

        return $rtn;
    }
}

<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\StudentModel;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $data = null;
        $rtn = array();
        $user = $request->all();

        if ($user['loginType'] === "teacher") {
            $teacher = TeacherModel::getAccount($user['account'], $user['password']);

            if ($teacher) {
                Session::put('loginAs', "teacher");
                Session::put('uid', $teacher->teacher_id);
                Session::put('name', $teacher->name);

                $data['loginAs'] = 'teacher';
                $data['username'] = $teacher->name;
            } else {
                $rtn['errmsg'] = "User not found!";
            }
        } elseif ($user['loginType'] === "student") {
            $student = StudentModel::getAccount($user['account'], $user['password']);

            if ($student) {
                Session::put('loginAs', "student");
                Session::put('uid', $student->student_id);
                Session::put('name', $student->name);

                $data['loginAs'] = 'student';
                $data['username'] = $student->name;
            } else {
                $rtn['errmsg'] = "User not found!";
            }
        }

        $rtn['result'] = $data;
        return $rtn;
    }
}

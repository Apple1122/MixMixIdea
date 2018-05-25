<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\CourseModel;

class CourseController extends Controller
{
    public function getUserCourses(){
        $rtn = array();

        $courses = CourseModel::getCoursesByUserId(Session::get('uid'));

        if($courses){
            $rtn['result'] = $courses;
        }else
            $rtn['errmsg'] = "Have no any course!";

        return $rtn;
    }
}

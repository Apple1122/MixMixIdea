<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::combine([
    '/',
    '/courselist',
    '/s_waiting',
    '/t_waiting',
<<<<<<< HEAD
    '/history'
=======
    '/gameroom_sixhat',
    '/analysis'
>>>>>>> 6b58843a14f40cafcd34d5a2d8ee8617aa417f69
], function () {
    return view('app');
});

Route::post('/login', 'AccountController@login');

Route::prefix('/courselist')->group(function () {
    Route::post('/getCourses', 'CourseController@getUserCourses');
    Route::post('/createroom', 'RoomController@createRoom');
    Route::post('/findroom', 'CourseController@findRoom');
});

Route::prefix('/room')->group(function () {
    Route::post('/leave', 'RoomController@leaveRoom');    
    Route::post('/gameStart', 'RoomController@gameStart');

    //player join room when the game start! not the momoent they enter room
    Route::post('/join', 'RoomController@joinRoom');
});

Route::post('/getcourse', 'CourseController@getCourse');


Route::get('/getAllSession', 'Controller@getAllSession');

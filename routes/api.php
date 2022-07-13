<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/participant', 'ParticipantController@tesApi');
Route::post('/subjects', 'SubjectController@store');
Route::get('/subjects','SubjectController@show');
Route::put('/subjects','SubjectController@update');
Route::delete('/subjects', 'SubjectController@delete');

Route::get('/question/subjects', 'QuestionController@subjects');
Route::get('/questions', 'QuestionController@show');
Route::post('/question', 'QuestionController@store');
Route::put('/question', 'QuestionController@update');
Route::delete('/question', 'QuestionController@delete');

Route::get('/ujian', 'QuestionController@question');

Route::post('/schedule', 'ScheduleController@store');
Route::put('/schedule', 'ScheduleController@update');
Route::get('/schedules', 'ScheduleController@show');
Route::delete('/schedules', 'ScheduleController@delete');

Route::get('/announcements', 'AnnouncementController@show');
Route::post('/announcement', 'AnnouncementController@store');
Route::put('/announcement', 'AnnouncementController@update');
Route::delete('/announcement', 'AnnouncementController@delete');
 
Route::get('/flow', 'FlowController@show');
Route::post('/flow', 'FlowController@store');
Route::put('/flow', 'FlowController@update');

Route::get('/fee', 'TuitionfeeController@show');
Route::post('/fee', 'TuitionfeeController@store');
Route::put('/fee', 'TuitionfeeController@update');

Route::get('/study', 'StudyController@show');
Route::post('/study', 'StudyController@store');
Route::put('/study', 'StudyController@update');

Route::get('/user', 'UserController@show');
Route::post('/user', 'UserController@store');
Route::get('/user/{any}', 'UserController@userDetail');
Route::put('/user', 'UserController@update');
Route::put('/user/password', 'UserController@updatePassword');
Route::delete('/user', 'UserController@delete');

Route::get('user/biodata/{any}', 'BiodataController@show');
Route::post('/user/biodata', 'BiodataController@store');
Route::put('/user/biodata', 'BiodataController@update');


Route::get('/date', 'ScheduleController@getDate');
Route::get('/date_/{any}', 'ScheduleController@getDate_');

Route::post('/dataone', 'ResultController@storeOne');
Route::post('/data', 'ResultController@store');
Route::get('/data/{user_id}', 'ResultController@show');
Route::get('/admin/data/{user_id}', 'ResultController@showData');


Route::get('/participant', 'UserController@participant');
Route::get('/participants', 'UserController@participants');
Route::post('/upload', 'UploadController@store');
Route::get('/upload/{id}', 'UploadController@show');


Route::get('/activeparticipants', 'UserController@active_participants');
Route::put('/activeparticipant', 'UserController@update_activate');
Route::put('/updateschedule', 'UserController@update_schedule');

Route::get('/participantspasca', 'UserController@participants_s2');
Route::get('/activeparticipantspasca', 'UserController@activeparticipants_s2');
Route::get('/pendingparticipantspasca', 'UserController@pendingparticipants_s2');
Route::put('/activeparticipantspasca', 'UserController@active_participants_s2');

Route::get('/file/{user_id}', 'FileController@show');
Route::post('/file', 'FileController@store');

Route::get('/page', 'Auth\RegisterController@page');
Route::put('/page', 'Auth\RegisterController@activepage');

Route::get('/prodi', 'UserController@prodi');
Route::post('/prodi', 'UserController@add_prodi');
Route::put('/prodi', 'UserController@update_prodi');
Route::delete('/prodi', 'UserController@delete_prodi');


Route::get('/year', 'UserController@getYear');
Route::get('/prodi', 'UserController@getProdi');
Route::get('/prodis2', 'UserController@getProdi_s1');
Route::put('/prodis2', 'UserController@updateProdi_s1');

Route::get('/uploadfilekip/{user_id}', 'UploadFileKipController@show');
Route::post('/uploadfilekip', 'UploadFileKipController@store');



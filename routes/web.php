<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return redirect()->route('groups.index');
});

Route::resource('groups', 'GroupsController');
Route::get('groups/list/all', 'GroupsController@groupsList')->name('groups.list');
Route::get('groups/list/students/{groupId}', 'GroupsController@getStudentsList')->name('groups.students-list');

Route::resource('students', 'StudentsController');
Route::get('students/list/all', 'StudentsController@studentsList')->name('students.list');

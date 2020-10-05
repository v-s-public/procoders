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

Route::get('/', 'GroupsController@index');

Route::resource('groups', 'GroupsController');
Route::get('groups/list/all', 'GroupsController@groupsList')->name('groups.list');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
  return view('tasks');
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
  //
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
  //
});
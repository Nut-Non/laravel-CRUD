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
	$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
	]);

	if ($validator->fails()) {
			return redirect('/')
					->withInput()
					->withErrors($validator);
	}

	// Create The Task...
});

/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
  //
});
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

/**
 * Show all task.
 */
Route::get('/', function () {
	$tasks = Task::orderBy('created_at', 'asc')->get();

	return view('tasks', [
		'tasks' => $tasks
	]);
});

/**
 * Show task in edit page.
 */
Route::get('/task/{task}', function (Task $task) {
	return view('task_edit', [
		'task' => $task
	]);	
});

/**
 * Add New Task.
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

	// Create new task.
	$task = new Task;
	$task->name = $request->name;
	$task->save();

	return redirect('/');
});

/**
 * Delete Task.
 */
Route::delete('/task/{task}', function (Task $task) {
	$task->delete();

	return redirect('/');
});
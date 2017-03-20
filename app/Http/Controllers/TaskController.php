<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

// Use Task model.
use App\Task;

class TaskController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			// Display all tasks.
			$tasks = Task::orderBy('created_at', 'desc')->get();

			return view('tasks', [
				'tasks' => $tasks
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
      // Create form is in index.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
			$validator = Validator::make($request->all(), [
					'name' => 'required|max:20',
			]);

			if ($validator->fails()) {
					return redirect('/tasks')
							->withInput()
							->withErrors($validator);
			}

			// Create new task.
			$task = new Task;
			$task->name = $request->name;
			$task->save();

			return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
			return view('task_edit', [
				'task' => $task
			]);
    }

    /**
     * Update the specified resource in storage.
     *
		 * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task) {
			// Edit task.
			$task->name	=	$request->name;
			$task->save();

			return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
			// Delete task.
			$task->delete();

			return redirect('/tasks');
    }
}

<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

	<!-- Bootstrap Boilerplate... -->

	<div class="panel-body">
		<!-- Display Validation Errors -->
		
		@include('common.errors')
		<!-- New Task Form -->
		<form action='{{ url("tasks/{$task->id}") }}' method="POST" class="form-horizontal">
			{{ csrf_field() }} 
			{{ method_field('PUT') }}

			<!-- Task Name -->
			<div class="form-group">
				<label for="task" class="col-sm-3 control-label">Task</label>

				<div class="col-sm-6">
					<input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
				</div>
			</div>

			<!-- Edit Task Button -->
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i> Edit Task
					</button>
				</div>
			</div>
		</form>
	</div>
	
@endsection
@extends('app')

@section('content')
<div class="container">
	{!!$list->button!!}
	<a href="{{url('tasks/create')}}" 
	style="margin-left:20px;">Create New Task</a>

	<div>
		Appointments
	</div>
	<table border="1">
 @foreach($list as $task)
    <tr>
 	<td>{{$task->date}}</td>
 	<td>{{$task->time}}</td>
 	<td>
	<a href="{{ url('/tasks', $task->id )}}">
		{{$task->title}}
	</a>
	</td>
	<td>
	<a href="<?php  echo 'tasks/'.$task->id.'/edit'; ?>" class="btn">
		Edit
	</a>
	</td>
	<td>
	
	{!! Form::open(['method' => 'DELETE', 'url' => 'tasks/'.$task->id]) !!}
        <button type="submit">Delete</button>
    {!! Form::close() !!}

	</td>
	<p>{{$task->content}}</p>
	</tr>


@endforeach
	</table>
	

</div>
@endsection

@extends('app')

@section('content')
<div class="container">

	<div>
		All Appointments
	</div>
	<table border="1">
 @foreach($list as $task)
    <tr>
 	<td>{{$task->date}}</td>
 	<td>{{$task->time_index.":00"}}</td>
 	<td>
	<a href="{{ url('/tasks', $task->id )}}">
		{{$task->title}}
	</a>
	</td>
	<td>
		{{$task->text}}
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

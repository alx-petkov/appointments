@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>
	

	<h2 style="color: blue">{{$task->title}}</h2>
	<p>{{$task->text}}</p>
	<p>{{$task->time}}</p>


</div>
@endsection

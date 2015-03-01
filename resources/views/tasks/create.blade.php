@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>

	{!! Form::open(['url' => 'tasks']) !!}
	<div>
	{!! Form::input('date','date', date('d-m-Y'),['class' => 'form-control']) !!}
	{!! $errors->first('date')!!}
	</div>
	<div>
	<?php 

	$indexArray = array();
	for ($i=0; $i < 24; $i++) { 
		$indexArray[$i] = $i.':00 - '.($i+1).":00"; 
	}
	
	?>

	{!! Form::select('index', $indexArray) !!}
	{!! $errors->first('hour')!!}
	</div>
	<div>
	{!! Form::text('title', 'Appointment', ['class' => 'form-control']) !!}
	{!! $errors->first('title')!!}
	</div>
	<div>
	{!! Form::textarea('text', 'Details', ['class' => 'form-control']) !!}
	</div>
	<div>
	{!! Form::submit('Submit') !!}
	</div>


	{!! Form::close() !!}

	


</div>
@endsection

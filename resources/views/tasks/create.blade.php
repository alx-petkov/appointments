@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>

	{!! Form::open(['url' => 'tasks']) !!}
	<div>
	{!! Form::input('date','date', date('Y-m-d'),['class' => 'form-control']) !!}
	{!! $errors->first('date')!!}
	</div>
	<div>
	{!! Form::input('time','hour', null, ['class' => 'form-control']) !!}
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

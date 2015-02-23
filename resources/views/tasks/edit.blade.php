@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>

	{!! Form::model($original, ['method' => 'PATCH', 'url' => 'tasks/'.$original->id]) !!}
	<div>
	{!! Form::input('date','date',null, ['class' => 'form-control']) !!}
	{!! $errors->first('date')!!}
	</div>
	<div>
	{!! Form::input('time','hour',null, ['class' => 'form-control']) !!}
	{!! $errors->first('hour')!!}
	</div>
	<div>
	{!! Form::text('title',null, ['class' => 'form-control']) !!}
	{!! $errors->first('title')!!}
	</div>
	<div>
	{!! Form::textarea('text',null, ['class' => 'form-control']) !!}
	</div>
	<div>
	{!! Form::submit('Submit') !!}
	</div>

	{!! Form::close() !!}



</div>
@endsection

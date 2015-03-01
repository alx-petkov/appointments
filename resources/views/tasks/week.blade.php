@extends('app')

@section('content')
<div class="col-md-12 col-lg-12">
	{!!$list->button!!}
	<a href="{{url('tasks/create')}}" 
	style="margin-left:20px;">Create New Task</a>

	<div>   
        Appointments for {!! date('N') //$list->date 
        !!}
	</div>
@for($k = 1; $k < 8; $k++)
<div class="col-lg-2 col-md-2">
    {!! $list->week[$k] !!}
	<table style="text-align: center;">

  	@for($i = 0; $i < 24; $i++)

  	   	@if(count($list)>0 AND $list->first()->date == $list->week[$k] AND $list->first()->time_index == $i)
   			<?php $task = $list->first(); ?>
   			<tr>
                
                <td>{{$task->time_index.':00'}}</td>
                <td>
                    <a href="{{ url('/tasks', $task->id )}}">
                        {{$task->title}}
                    </a>
                </td>
                <td>
                	{{$task->text}}
                </td>
                <!--<td>
                    {!! Form::open(['method' => 'GET', 'url' => 'tasks/'.$task->id.'/edit']) !!}
                        <button type="submit">Edit</button>
                    {!! Form::close() !!}
                </td>-->
                <td colspan="2">
                    {!! Form::open(['method' => 'DELETE', 'url' => 'tasks/'.$task->id]) !!}
                        <button type="submit">Delete</button>
                    {!! Form::close() !!}
                </td>
            </tr>    	
			<?php $list->shift(); ?> 
		@else
			<tr>
                <td>
                    {!! Form::open(['url' => 'tasks']) !!}
                    {!! Form::hidden('date', $list->week[$k]) !!}
                    {!! Form::hidden('index', $i) !!}
                    {!! $i.':00' !!}
                </td>
                <td>
                	{!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Enter new task']) !!}
                    {!! $errors->first('title')!!}
                </td>
                <td>
                    {!! Form::text('text', null, ['class' => 'form-control','placeholder'=>'Details' ]) !!}
                </td>
                <td colspan="2">
                    {!! Form::submit('Submit') !!}
                    {!! Form::close() !!}
                </td>
                <!--<td></td>-->
            </tr>
		@endif

  	@endfor

	</table>
</div>
@endfor	

</div>
@endsection

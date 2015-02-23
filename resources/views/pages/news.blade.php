@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>
 


	<a href="{{ url('/news', $data->id )}}"><h2>{{$data->title}}</h2></a>
	<p>{{$data->content}}</p>
	<p>{{$data->datepub}}</p>



	

</div>
@endsection

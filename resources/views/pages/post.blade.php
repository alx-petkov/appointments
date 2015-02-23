@extends('app')

@section('content')
<div class="container">
	

	<div class="panel-body" style="color:red">
		Articles
	</div>
	

	<h2 style="color: blue">{{$article->title}}</h2>
	<p>{{$article->content}}</p>


</div>
@endsection

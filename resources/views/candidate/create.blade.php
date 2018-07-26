@extends('master')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h1 align="center"> Add Candidate </h1>
		@if(count($errors) > 0)
		<div class = "alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach	
			</ul>
		</div>
		@endif
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>				
			</div>
		@endif
		<form method="post" action="{{url('candidate')}}">
			{{csrf_field()}}
			<div class="form-group">
				<input type="text" name="name" class="form-control" placeholder="Insert candidate's name" />
			</div>
			<div class="form-group">
				<input type="date" name="birth_date" class="form-control" placeholder="Insert candidate birth date" />
			</div>
			<div class="form-group" align="center">
				<input type="submit" name="btn btn-primary" />
			</div>
		</form>
	</div>
</div>
@endsection
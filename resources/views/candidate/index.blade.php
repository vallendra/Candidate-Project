@extends('master')

@section('title', 'Index')

@section('content')
<div class="wrapper">
	<header class="header">
		<h1 align="center">Candidate Records</h1>
	</header>

	<section class = "main">	
		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
		@endif
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Birth Date</th>
				<th colspan="2">Actions</th>
			</tr>
			@foreach($candidates as $row)
			<tr>
				<td>{{$row['name']}}</td>
				<td>{{$row['birth_date']}}</td>
				<td>
					<a href="{{action('CandidateController@edit', $row['id'])}}" class="btn btn-info"><span class="	glyphicon glyphicon-pencil"></span> Edit</a>
				</td>
				<td>
					<form method="post" class="delete-form" action="{{action('CandidateController@destroy', $row['id'])}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		<div align="center">
			<a href="{{route('candidate.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Add a new candidate</a>
		</div>
	</div>
</section>
  
@endsection
@extends('master')

@section('title', 'Index')

@section('content')
	<div class = "col-md-12">
		<br>
		<h3 align="center">Candidates Data</h3>
		<br>
		@if($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{$message}}</p>
			</div>
		@endif
		<table class="table table-bordered table-striped">
			<tr>
				<th>Name</th>
				<th>Birth Date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			@foreach($candidates as $row)
			<tr>
				<td>{{$row['name']}}</td>
				<td>{{$row['birth_date']}}</td>
				<td><a href="{{action('CandidateController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
				<td>
					<form method="post" class="delete-form" action="{{action('CandidateController@destroy', $row['id'])}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-danger" >Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		<div align="center">
			<a href="{{route('candidate.create')}}" class="btn btn-primary">Add a new candidate</a>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('.delete-form').on('submit', function() {
				if(confirm("Are you sure want to delete the candidate?")) {
					return true
				} 
				else {
					return false
				}
			});
		});
	</script>
  
@endsection
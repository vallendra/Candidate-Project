@extends('master')

@section('content')
	<div class = "row">
		<div class = "col-md-12">
			<h3>Edit Candidate</h3>
			
			@if(count($errors) > 0 )

				@foreach($errors->all as $error)
				<li>{{$error}}</li>
				@endforeach

			@endif
			<form method="post" action="{{action('CandidateController@update', $id)}}">
				{{csrf_field()}}
					<input type="hidden" name="_method" value="PATCH">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="Insert candidate's name" value="{{$candidate->name}}" />
					</div>
					<div class="form-group">
						<input type="date" name="birth_date" class="form-control" placeholder="Insert candidate birth date" value="{{$candidate->birth_date}}" />
					</div>
					<div class="form-group">
						<input type="submit" value="edit" class="btn btn-primary">	
					</div>
				
			</form>
			
		</div>
		
	</div>

@endsection
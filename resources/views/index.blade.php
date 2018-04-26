@extends('master')
@section('content')
	<div class="col-lg-12">
		<h1 class="text-center">Users stored in database</h1><br>
		@include('messages')
		<a href="/" style="float: right;" class="btn btn-dark btn-md">Back to Front</a>
		<a href="/crud/create" style="float: right;;margin-right: 10px;" class="btn btn-info btn-md">Create a user</a><br><br>
		<table class="table table-bordered table-striped">
			<tr>
				<th>User ID</th>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>Actions</th>
			</tr>
			@if(count($users) > 0)
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td><img height="100px" width="100px;" class="img-thumbnail" src="/user_images/{{ $user->user_image}}"></td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<div class="row" style="margin-left: 5px;">
						<a href="/crud/{{ $user->id }}" style="margin-right: 10px;" class="btn btn-info btn-sm">view</a>
						<a href="/crud/{{ $user->id }}/edit" style="margin-right: 10px;" class="btn btn-warning btn-sm">edit</a>
						{!! Form::open(['action' => ['CrudController@destroy', $user->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm float-right'])}}
                        {!! Form::close() !!}
						</div>
					</td>
				</tr>
			@endforeach
			@else
				<h3 class="text-center">No user in Database</h3>
			@endif
		</table>
		
	</div>
@endsection

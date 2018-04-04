@extends('master')
@section('content')
<div class="col-lg-12">
	<h1 class="text-center">Laravel CRUD</h1><br>
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="card-text">
							This is a simple application done using Laravel to perform CRUD operations including Create, Retrieve, Update and Delete. 
						</div><br>
						<img src="https://i0.wp.com/happycoder.me/wp-content/uploads/2018/01/laravel-5.6-1.jpg?fit=700%2C368" style="width: 670px; height: 300px; margin: auto;display: block;"><br>
						<a href="/crud/create" class="btn btn-primary">CREATE A USER</a>
						<a href="/crud" class="btn btn-success">VIEW USERS</a>
					</div>
				</div>

			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
@endsection

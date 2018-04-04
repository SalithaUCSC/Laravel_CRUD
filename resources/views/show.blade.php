@extends('master')
@section('content')
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				@include('messages')
				<div class="card">
					<div class="card-body">
					    <div class="row">
					    	<div class="col-lg-6" style="float: left;">
					    		<img class="img-thumbnail" src="/storage/user_images/{{ $user->user_image}}">
					    	</div>
					    	<div class="col-lg-6" style="float: right;">
					    		<ul class="list-group">
					    			<li class="list-group-item"><b>User ID :</b> {{ $user->id }}</li>
					    			<li class="list-group-item"><b>Name :</b> {{ $user->name }}</li>
					    			<li class="list-group-item"><b>Email:</b> {{ $user->email }}</li>
					    			<li class="list-group-item"><b>Created at :</b><br> {{ date('h: i a', strtotime($user->created_at) )}} on {{ date('F j, Y', strtotime($user->created_at) )}}</li>
					    			<li class="list-group-item"><b>Updated at :</b><br> {{ date('h: i a', strtotime($user->created_at) )}} on {{ date('F j, Y', strtotime($user->updated_at) )}}</li><br>
					    			<a href="/crud" style="float: right;" class="btn btn-dark btn-md">Back to users</a>
					    		</ul>
					    	</div>
					    </div>
	                    <br>
	                        
                   
                					
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div>
	</div>
@endsection

@extends('master')
@section('content')
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<h1 class="text-center">Edit a User</h1><br>
				@include('messages')
				<div class="card">
					<div class="card-body">
					    {!! Form::open(['action' => ['CrudController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					    <div class="form-group">
					        {{ Form::label('name', 'Your Name ', ['class' => 'form-label'] )}}
					        {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Give a Name', 'id' => 'name']) }}
					    </div>
					    <div class="form-group">
					        {{ Form::label('email', 'Your Email ', ['class' => 'form-label'] )}}
					        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Give an email', 'id' => 'email']) }}
					    </div>   
					    <div class="form-group">
		                    <div class="row">
		                        <div class="col-lg-6">
		                            <p>New Image</p><br>
		                            {{ Form::file('user_image',['class' => 'dropify'])}}
		                        </div>
		                        <div class="col-lg-6">
		                            <p>Existing Image</p><br>
		                            <img src="/storage/user_images/{{$user->user_image}}"  style="width: 200px; height: 200px;" id="post-img-edit">
		                        </div>
		                    </div>
                    	<br><br>
                		</div>
					 	<div class="row" style="margin-left: -5px;">
	                    <div style="float: left;">
	                        {{ Form::hidden('_method', 'PUT')}}
	                        {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-md']) }}
	                        {!! Form::close() !!}
	                    </div>
	                    <div style="float: right;">
	                        <a href="/crud/{{ $user->id }}" class="btn btn-dark btn-md">Cancel</a>
                    	</div>
                		</div>			
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
@endsection

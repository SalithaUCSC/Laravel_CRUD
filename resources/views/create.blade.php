@extends('master')
@section('content')
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<h1 class="text-center">Laravel CRUD</h1><br>
				@include('messages')
				<div class="card">
					<div class="card-body">
					    {!! Form::open(['action' => 'CrudController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					    <div class="form-group">
					        {{ Form::label('name', 'Your Name ', ['class' => 'form-label'] )}}
					        {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Give a Name', 'id' => 'name']) }}
					    </div>
					    <div class="form-group">
					        {{ Form::label('email', 'Your Email ', ['class' => 'form-label'] )}}
					        {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Give an email', 'id' => 'email']) }}
					    </div>   
					    <div class="form-group">
					        {{ Form::file('user_image', ['class' => 'dropify'])}}
					    </div>
					    <div class="row" style="margin-left: 0px;">
					    	<div class="log-lg-6">
					    		{{ Form::submit('SUBMIT', ['class' => 'btn btn-primary btn-md']) }}     
					    		{!! Form::close() !!}	
					    	</div>
					    	<div class="log-lg-6">
					    		<a href="/crud" class="btn btn-dark btn-md" style="margin-left: 10px;">Back to users</a>			
					    	</div>
					    </div>
					</div>
				</div>
			</div>
			<div class="col-lg-3"></div>
		</div>
	</div>
@endsection

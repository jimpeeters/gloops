@extends('layouts.master')

@section('title', 'Register to Gloops')

@section('content')

	<div class="register">
		<div class="col-xs-12 col-lg-6 col-lg-offset-3">
			<h2 class="title">Register</h2>
			
			@if (count($errors) > 0)
			    <div ng-controller="AlertController">
			    	<div class="info-box error" ng-hide="hidden" ng-class="{fade: startFade}">
			    		@foreach ($errors->all() as $key => $error)
							<p>
								<i class="fa fa-times alert-type-icon"></i>{{ $error }}
								@if($key == 0)
									<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
								@endif
							</p>
						@endforeach
					</div>
			    </div>
			@endif

			{!! Form::open(array('route' => 'register', 'method' => 'POST','files' => true)) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name','',array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Name')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email','',array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Email' )) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Password')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm Password') !!}
					{!! Form::password('password_confirmation', array('class' => 'form-control', 'required' => 'required', 'placeholder' => 'Confirm your password')) !!}
				</div>
				<div class="form-group">
				    <div class="custom-file-upload">
					    {!! Form::label('file', 'Profile picture (optional)') !!}
					    <input type="file" id="file" name="image" multiple />
					</div>
				</div>

				<button type="submit" class="basic-button">Register</button>
			{!! Form::close() !!}	
		</div>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 toggle-text">
		    <p ng-show="!loginView">You already have an account? <a data-toggle="modal" data-target="#loginModal" href="">Login now</a></p>
		</div>
	</div>

@stop
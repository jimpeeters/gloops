@extends('layouts.master')

@section('title', 'Register to Gloops')

@section('content')

	@if(session()->has('registerMessages'))
	 	<div ng-init="loginView = false"></div>
	@else
	 	<div ng-init="loginView = true"></div>
	@endif

	<div class="title-section" style="background-image: url('/images/register.jpg');">
		<h1 ng-show="!loginView">REGISTER</h1>
		<h1 ng-show="loginView">LOGIN</h1>
	</div>

	@if (count($errors) > 0)
	    <div class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="AlertController">
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

	<div class="register" ng-init="loginView = false">
		<div ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
			{!! Form::open(array('route' => 'register', 'method' => 'POST','files' => true)) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name') !!}
					{!! Form::text('name','',array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email','',array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm Password') !!}
					{!! Form::password('password_confirmation', array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<div class="form-group">
				    <div class="custom-file-upload">
					    {!! Form::label('file', 'Profile picture') !!}
					    <input type="file" id="file" name="file" multiple />
					</div>
				</div>

				<button type="submit" class="basic-button">Register</button>
			{!! Form::close() !!}	
		</div>

		<div ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
			{!! Form::open(array('route' => 'login', 'method' => 'POST')) !!}
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					{!! Form::text('email','',array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', array('class' => 'form-control', 'required' => 'required')) !!}
				</div>
				<button href="" type="submit" class="basic-button">Login</button>
			{!! Form::close() !!}	
		</div>

		<div class="col-xs-12 col-lg-6 col-lg-offset-3 toggle-text">
			<p ng-show="loginView">You don't have an account yet? <a ng-click="loginView = false" href="">Register now</a></p>
		    <p ng-show="!loginView">You already have an account? <a ng-click="loginView = true"  href="">Login now</a></p>
		</div>
	</div>

@stop
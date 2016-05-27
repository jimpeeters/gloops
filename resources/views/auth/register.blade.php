@extends('layouts.master')

@section('title', 'Register to Gloops')

@section('content')

	<div class="register" ng-controller="RegisterController">
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
					<input 
					    	type="text" 
					    	name="name"
					    	value="" 
					    	ng-model="name"
							ng-model-options='{ debounce: 300 }'
							class="form-control"
							ng-class="{ enabled : nameIsValid }"
							ng-change="checkName(name)"
							placeholder="Your nickname"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email') !!}
					<input 
					    	type="text" 
					    	name="email"
					    	value="" 
					    	ng-model="email"
							ng-model-options='{ debounce: 300 }'
							class="form-control"
							ng-class="{ enabled : emailIsValid }"
							ng-change="checkEmail(email)"
							placeholder="Your email"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					<input 
					    	type="password" 
					    	name="password"
					    	value="" 
					    	ng-model="password"
							ng-model-options='{ debounce: 300 }'
							class="form-control"
							ng-class="{ enabled : passwordIsValid }"
							ng-change="checkPassword(password)"
							placeholder="Your password"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm Password') !!}
					<input 
						class="form-control"
						placeholder="Confirm your password" 
						name="password_confirmation" 
						type="password"
						ng-model="passwordConfirmation"
						ng-model-options='{ debounce: 300 }'
						ng-class="{ enabled : passwordConfirmationIsValid }"
						ng-change="checkPasswordConfirmation(passwordConfirmation)"
						value="" 
						id="password_confirmation"
						required>
				</div>
				<div class="form-group">
				    <div class="custom-file-upload">
					    {!! Form::label('file', 'Profile picture (optional)') !!}
					    <input type="file" id="file" name="image" multiple ng-model="file" onchange="angular.element(this).scope().checkFile()"/>
					</div>
				</div>

				<button type="submit" ng-disabled="!uploadEnabled" ng-class="{ disabled : !uploadEnabled}" class="basic-button">Register</button>
			{!! Form::close() !!}	
		</div>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 toggle-text">
		    <p ng-show="!loginView">You already have an account? <a data-toggle="modal" data-target="#loginModal" href="">Login now</a></p>
		</div>
	</div>

@stop
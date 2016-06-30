@extends('layouts.master')

@section('title', 'Register to Gloops')

@section('content')

	<div class="register" data-ng-controller="RegisterController">
		<div class="col-xs-12 col-lg-6 col-lg-offset-3">
			<h2 class="title">Register</h2>
			
			@if (count($errors) > 0)
			    <div data-ng-controller="AlertController">
			    	<div class="info-box error" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
			    		@foreach ($errors->all() as $key => $error)
							<p>
								<i class="fa fa-times alert-type-icon"></i>{{ $error }}
								@if($key == 0)
									<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
								@endif
							</p>
						@endforeach
					</div>
			    </div>
			@endif

			{!! Form::open(array('route' => 'register', 'method' => 'POST','files' => true, 'enctype' => 'multipart/form-data')) !!}
				<div class="form-group">
					{!! Form::label('name', 'Name *') !!}
					<input 
					    	type="text" 
					    	name="name"
					    	value="{{ old('name') }}" 
					    	data-ng-model="name"
							data-ng-model-options='{ debounce: 300 }'
							class="form-control"
							data-ng-class="{ enabled : nameIsValid }"
							data-ng-change="checkName(name)"
							placeholder="Your nickname"
							id="registerName"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('email', 'Email *') !!}
					<input 
					    	type="text" 
					    	name="email"
					    	value="{{ old('email') }}" 
					    	data-ng-model="email"
							data-ng-model-options='{ debounce: 300 }'
							class="form-control"
							data-ng-class="{ enabled : emailIsValid }"
							data-ng-change="checkEmail(email)"
							placeholder="Your email"
							id="registerEmail"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password *') !!}
					<input 
					    	type="password" 
					    	name="password"
					    	value="" 
					    	data-ng-model="password"
							data-ng-model-options='{ debounce: 300 }'
							class="form-control"
							data-ng-class="{ enabled : passwordIsValid }"
							data-ng-change="checkPassword(password)"
							placeholder="Your password"
							required>
				</div>
				<div class="form-group">
					{!! Form::label('password_confirmation', 'Confirm Password *') !!}
					<input 
						class="form-control"
						placeholder="Confirm your password" 
						name="password_confirmation" 
						type="password"
						data-ng-model="passwordConfirmation"
						data-ng-model-options='{ debounce: 300 }'
						data-ng-class="{ enabled : passwordConfirmationIsValid }"
						data-ng-change="checkPasswordConfirmation(passwordConfirmation)"
						value="" 
						id="password_confirmation"
						required>
				</div>
				<div class="form-group">
				    <div class="custom-file-upload">
					    {!! Form::label('file', 'Profile picture (optional)') !!}
					    <input type="file" id="file" name="image" multiple data-ng-model="file" onchange="angular.element(this).scope().checkFile()"/>
					</div>
				</div>

				<button type="submit" data-ng-disabled="!uploadEnabled" data-ng-class="{ disabled : !uploadEnabled}" class="basic-button">Register</button>
			{!! Form::close() !!}
				<div class="form-group">
					<center><a class="facebook-login-button basic-button" href="{{ route('facebookLogin') }}" class="basic-button"><i class="fa fa-facebook"></i>Facebook Login</a></center>
				</div>

		</div>
		<div class="col-xs-12 col-lg-6 col-lg-offset-3 toggle-text">
		    <p data-ng-show="!loginView">You already have an account? <a data-toggle="modal" data-target="#loginModal" href="">Login now</a></p>
		</div>
	</div>

@stop
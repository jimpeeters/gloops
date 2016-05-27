<section class="login-register">

	@if(session()->has('registerMessages'))
	 	<div ng-init="loginView = false"></div>
	@else
	 	<div ng-init="loginView = true"></div>
	@endif

	<div ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
		<h2 class="title">Register</h2>
	</div>

	<div ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
		<h2 class="title">Login</h2>
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
	@else

		<div ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="AlertController">
			<div class="info-box info" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i> Please <strong>login</Strong> or <strong>register</strong> to access this page.
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

		<div ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="AlertController">
			<div class="info-box success" ng-hide="hidden" ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i> You can enjoy a lot of <strong>free awesome features</strong> when registering to gloops !
					<i ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif


	<div ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" ng-controller="RegisterController">
		{!! Form::open(array('route' => 'register', 'method' => 'POST','files' => true)) !!}
			<div class="form-group">
				{!! Form::label('name', 'Name') !!}
				<input 
				    	type="text" 
				    	name="name"
				    	value="{{ Input::get('name') }}" 
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
				    	value="{{ Input::get('email') }}" 
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

</section>
<section class="login-register">

	@if(session()->has('registerMessages'))
	 	<div data-ng-init="loginView = false"></div>
	@else
	 	<div data-ng-init="loginView = true"></div>
	@endif

	<div data-ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
		<h2 class="title">Register</h2>
	</div>

	<div data-ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
		<h2 class="title">Login</h2>
	</div>

	@if (count($errors) > 0)
	    <div class="col-xs-12 col-lg-6 col-lg-offset-3" data-ng-controller="AlertController">
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
	@else

		<div data-ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" data-ng-controller="AlertController">
			<div class="info-box info" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i> Please <strong>login</Strong> or <strong>register</strong> to access this page.
					<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

		<div data-ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" data-ng-controller="AlertController">
			<div class="info-box success" data-ng-hide="hidden" data-ng-class="{fade: startFade}">
				<p>
					<i class="fa fa-info alert-type-icon"></i> You can enjoy a lot of <strong>free awesome features</strong> when registering to gloops !
					<i data-ng-click="closeAlert()" class="fa fa-times close-button"></i>
				</p>
			</div>
		</div>

	@endif


	<div data-ng-show="!loginView" class="col-xs-12 col-lg-6 col-lg-offset-3" data-ng-controller="RegisterController">
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

	<div data-ng-show="loginView" class="col-xs-12 col-lg-6 col-lg-offset-3">
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
		<div class="form-group">
			<center><a class="facebook-login-button basic-button" href="{{ route('facebookLogin') }}" class="basic-button"><i class="fa fa-facebook"></i>Facebook Login</a></center>
		</div>
	</div>

	<div class="col-xs-12 col-lg-6 col-lg-offset-3 toggle-text">
		<p data-ng-show="loginView">You don't have an account yet? <a data-ng-click="loginView = false" href="">Register now</a></p>
	    <p data-ng-show="!loginView">You already have an account? <a data-ng-click="loginView = true"  href="">Login now</a></p>
	</div>

</section>
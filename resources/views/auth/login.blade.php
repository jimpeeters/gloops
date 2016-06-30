<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h2>Login</h2>
		    </div>
		    <div class="modal-body">
				<div class="row">
					@if (count($errors) > 0)
					    <div class="col-xs-12" data-ng-controller="AlertController">
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
				</div>
				<div class="row login-modal">
					<div class="col-xs-12">
						{!! Form::open(array('route' => 'loginModal', 'method' => 'POST')) !!}
							<div class="form-group">
								{!! Form::label('email', 'Email') !!}
								{!! Form::text('email','',array('class' => 'form-control')) !!}
							</div>
							<div class="form-group">
								{!! Form::label('password', 'Password') !!}
								{!! Form::password('password', array('class' => 'form-control')) !!}
							</div>
							<center><button type="submit" class="basic-button">Login</button></center>
						{!! Form::close() !!}	
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<center><a class="facebook-login-button basic-button" href="{{ route('facebookLogin') }}" class="basic-button"><i class="fa fa-facebook"></i>Facebook Login</a></center>
					</div>
				</div>
			</div>
		    <div class="modal-footer">
		      	<p class="register-text">You don't have an account yet? <a id="register-now-button" href="{{ route('getRegister') }}">Register now</a></p>
		    </div>
		</div>
	</div>
</div>
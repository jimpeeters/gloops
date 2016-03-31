
<!-- Modal -->
<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      	<button type="button" class="close" data-dismiss="modal">&times;</button>
      	<h4 id="login-header-title">Login</h4>
      </div>
      <div class="modal-body">
		<div class="row">
			<div class="col-md-12">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
					    <ul>
					        @foreach ($errors->all() as $error)
					            <li>{{ $error }}</li>
					        @endforeach
					    </ul>
					</div>
				@endif
			</div>
		</div>
		<div class="row login-modal">
			<div class="col-md-12">
				{!! Form::open(array('route' => 'login', 'method' => 'POST')) !!}
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email','',array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password') !!}
						{!! Form::password('password', array('class' => 'form-control')) !!}
					</div>
					<center><button href="" type="submit" class="basic-button">Login</button></center>
				{!! Form::close() !!}	
			</div>
		</div>
		<div class="row register-modal hidden">
			<div class="col-md-12">
				{!! Form::open(array('route' => 'register', 'method' => 'POST','files' => true)) !!}
					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name','',array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! Form::text('email','',array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Password') !!}
						{!! Form::password('password', array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password_confirmation', 'Confirm Password') !!}
						{!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
					</div>
					<div class="form-group">
					    <div class="custom-file-upload">
						    {!! Form::label('file', 'Profile picture') !!}
						    <input type="file" id="file" name="myfiles[]" multiple />
						</div>
					</div>

					<center><button href="" type="submit" class="basic-button">Register</a></button>
				{!! Form::close() !!}	
			</div>
		</div>
	  </div>
      <div class="modal-footer">
      	<p class="register-text">You don't have an account yet? <a id="register-now-button" href="">Register now</a></p>
      	<p class="login-text hidden">You already have an account? <a id="login-now-button" href="">Login now</a></p>
      </div>
	</div>

  </div>
</div>
<div id="successfullFacebookLoginModal" class="modal fade login-modal" data-show="true" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h2>Facebook Login</h2>
		    </div>
		    <div class="modal-body">
				<h3>Facebook Login successfull!</h3>
				<p>Hi {{ Session::get('successfullFacebookLogin') }}!</p>
			</div>
			<div class="modal-footer">
		      	<p>You want to edit your profile info? <a href="{{ route('profile') }}">Go to profile page</a></p>
		    </div>
		</div>
	</div>
</div>
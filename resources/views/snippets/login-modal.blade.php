<div id="successfullLoginModal" class="modal fade login-modal" data-show="true" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h4>Login</h4>
		    </div>
		    <div class="modal-body">
				<h3>Login successfull!</h3>
				<p>We are glad to have you back.</p>
				<a href="{{ route('station') }}" class="basic-button">STATION</a>
			</div>
			<div class="modal-footer">
		      	<p>You want to edit your profile info? <a href="{{ route('profile') }}">Go to profile page</a></p>
		    </div>
		</div>
	</div>
</div>
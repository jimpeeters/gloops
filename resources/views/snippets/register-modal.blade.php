<div id="successfullRegisterModal" class="modal fade register-modal" data-show="true" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h2>Register</h2>
		    </div>
		    <div class="modal-body">
				<h3>Hi {{ Session::get('successfullRegister') }}!</h3>
				<p>You have joined the Gloops community.</p>
			</div>
			<div class="modal-footer">
		      	<p>Start visiting your very own loop station? <a href="{{ route('station') }}">Go to your station</a></p>
		    </div>
		</div>
	</div>
</div>
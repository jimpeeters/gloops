<div id="successfullLogoutModal" class="modal fade logout-modal" data-show="true" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h2>Logout</h2>
		    </div>
		    <div class="modal-body">
				<h3>Logout successfull!</h3>
				<p>We hope to see you again soon {{ Session::get('successfullLogout') }}.</p>
			</div>
			<div class="modal-footer">
		      	<p>Still want to browse loops? <a href="{{ route('library') }}">Go to library</a></p>
		    </div>
		</div>
	</div>
</div>
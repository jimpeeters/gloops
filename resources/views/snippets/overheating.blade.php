<div id="overheating-modal" class="modal fade" tabindex="-1" role="dialog">
	<div ng-if="isOverheating()" class="modal-dialog reward-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="login-header-title">Danger</h4>
			</div>
			<div class="modal-body reward">
				    <center><i class="reward-icon fa fa-exclamation-triangle fa-3x"></i></center>
				    <h2 class="reward-title">OVERHEATING</h2>
				    <p class="reward-info">Watch out! By playing a lot of loops together, you could crash your browser!</p>
				    <button class="basic-button" onClick="window.location.reload()">Reload your page</button>
			</div>
		</div>
  	</div>
</div>
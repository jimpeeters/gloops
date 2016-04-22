<div id="overheating-modal" class="modal fade" tabindex="-1" role="dialog">
	<div ng-if="isOverheating()" class="modal-dialog reward-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="login-header-title">Reward</h4>
			</div>
			<div class="modal-body reward">
				@if(Auth::check())
				    <center><i class="reward-icon fa fa-trophy fa-3x"></i></center>
				    <h2 class="reward-title">OVERHEATING</h2>
				    @if(Auth::user()->earnedReward1 == true)
					    <p class="reward-info">Three words : Impulse Control Disorder</p>
					    <a href="{{ route('profile') }}" class="basic-button">YOUR REWARDS</a>
					@else
						<p class="reward-info">You have earned the overheating reward by playing 9 loops!</p>
					    <a href="{{ route('overheating') }}" class="basic-button">CLAIM</a>
					@endif
			    @else
			    	<center><i class="reward-icon fa fa-question-circle fa-3x"></i></center>
				    <h2 class="reward-title">SECRET</h2>
				    <p class="reward-info">You have earned a reward. Register to find out more... .</p>
				    <a href="{{ route('getRegister') }}" class="basic-button">REGISTER</a>
				@endif
			</div>
		</div>
  	</div>
</div>
<div id="recordModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
	    <div class="modal-content">
		    <div class="modal-header">
		      	<button type="button" class="close" data-dismiss="modal">&times;</button>
		      	<h4 id="login-header-title">Record</h4>
		    </div>
		    <div class="modal-body">
				<div class="col-xs-12">
					<div class="record" ng-controller='RecordController'>
					    <ng-audio-recorder id="mainAudio" audio-model="recorded" show-player="false" time-limit="timeLimit">
					        <div ng-if="recorder.isAvailable">

					        	<a class="record-button-modal btn-floating waves-effect waves-light btn-large red" ng-click="recorder.startRecord()" type="button" ng-hide="recorder.status.isDenied === true || recorder.status.isRecording || recorder.status.isConverting">
					        		<i class="fa fa-microphone"></i>
					        	</a>

					        	<a class="pauze-button-modal btn-floating waves-effect waves-light btn-large red" ng-click="recorder.stopRecord()" type="button" ng-hide="recorder.status.isRecording === false">
					        		<i class="fa fa-stop"></i>
					        	</a>
								
					        	<div class="preloader-wrapper big active" ng-show="recorder.status.isConverting">
								    <div class="spinner-layer spinner-blue-only">
									     <div class="circle-clipper left">
									        <div class="circle"></div>
									    </div><div class="gap-patch">
									        <div class="circle"></div>
									    </div><div class="circle-clipper right">
									        <div class="circle"></div>
									    </div>
								    </div>
								</div>
					
					            <div ng-if="recorder.status.isDenied === true">
					                You need to grant permission for this application to USE your microphone.
					            </div>

					            <div class="button-record-options">
						            <a class="btn-floating waves-effect waves-light btn-small red" ng-click="recorder.status.isPlaying ? recorder.playbackPause() : recorder.playbackResume()" type="button" ng-disabled="recorder.status.isRecording || !recorder.audioModel" ng-class="{ 'disabled' : recorder.status.isRecording || !recorder.audioModel }">
						        		<i class="fa fa-<% recorder.status.isStopped || recorder.status.isPaused ? 'play' : 'pause' %>"></i>
						        	</a>

						        	<a class="btn-floating waves-effect waves-light btn-small red" ng-click="recorder.save()" ng-disabled="recorder.status.isRecording || !recorder.audioModel" ng-class="{ 'disabled' : recorder.status.isRecording || !recorder.audioModel }">
						        		<i class="fa fa-download"></i>
						        	</a>
					        	</div>
					
					            <h2 class="time" ng-if="recorder.status.isRecording">
					                <% recorder.elapsedTime > 9 ? recorder.elapsedTime : ('0'+recorder.elapsedTime) %>
					            </h2>
					
					            <div ng-if="recorder.status.isRecording" class="progress">
							      <div class="determinate" style="width: <% (recorder.elapsedTime / 60) * 100 %>%"></div>
							  </div>
					        </div>
					
					
					        <div ng-if="!recorder.isAvailable">
					            Your browser does not support this feature natively, please use latest version of <a
					                href="https://www.google.com/chrome/browser" target="_blank">Google Chrome</a> or <a
					                href="https://www.mozilla.org/en-US/firefox/new/" target="_blank">Mozilla Firefox</a>. If you're on
					            Safari or Internet Explorer, you can install <a href="https://get.adobe.com/flashplayer/">Adobe Flash</a> to
					            use this feature.
					        </div>
					    </ng-audio-recorder>

					</div>
				</div>
			</div>
		    <div class="modal-footer">
		      	<p class="register-text">Did you download your loop? <a href="#">Watch a tutorial video on how to make the perfect loop!</a></p>
		    </div>
		</div>
	</div>
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Gloops Recording</title>
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/wavesurfer.js/dist/wavesurfer.min.js"></script>
    <script src="bower_components/angularAudioRecorder/dist/angular-audio-recorder.min.js"></script>
    <script>
    	(function () {
			  'use strict';
			
			  	var recordApp = angular.module('recordApp', [
				      'angularAudioRecorder'
				    ])
				    .controller('RecordController', function ($scope, $timeout) {
				      console.log("Loaded");
				      $scope.timeLimit = 10;
				
				
				    }).config(function (recorderServiceProvider) {
				    recorderServiceProvider
				      .forceSwf(false)
				      .withMp3Conversion(true)
				    ;
				});
			  
			  	// Replace brackets with these symbols to avoid conflict with laravel
				recordApp.config(function ($interpolateProvider) {
				
				    $interpolateProvider.startSymbol('<%');
				    $interpolateProvider.endSymbol('%>');
				
				});
			
			})();
    </script>
</head>

<body ng-app="recordApp" ng-cloak="">
	
	<div class="col-xs-12 col-sm-4 col-lg-2">
	    <a href="{{ route('station') }}" class="basic-button"><i class="fa fa-chevron-left"></i>   Back to station</a>
	</div>
		
	<div ng-controller='RecordController'>
	    <h1>Welcome to Recorder Demo </h1>
	
	    <ng-audio-recorder id="mainAudio" audio-model="recorded" show-player="false" time-limit="timeLimit">
	        <div ng-if="recorder.isAvailable">
	
	            <div ng-if="recorder.status.isDenied === true" style="color: red;">
	                You need to grant permission for this application to USE your microphone.
	            </div>
	            <button ng-click="recorder.startRecord()" type="button"
	                    ng-disabled="recorder.status.isDenied === true || recorder.status.isRecording">
	                Start Record
	            </button>
	            <button ng-click="recorder.stopRecord()" type="button" ng-disabled="recorder.status.isRecording === false">
	                Stop Record
	            </button>
	
	            <button ng-click="recorder.status.isPlaying ? recorder.playbackPause() : recorder.playbackResume()"
	                    type="button" ng-disabled="recorder.status.isRecording || !recorder.audioModel">
	                <% recorder.status.isStopped || recorder.status.isPaused ? 'Play' : 'Pause' %>
	            </button>
	
	            <button ng-click="recorder.save()" ng-disabled="recorder.status.isRecording || !recorder.audioModel">
	                Download
	            </button>
	
	            <div style="max-width: 600px">
	                <div ng-show="recorder.status.isConverting">
	                    Please wait while your recording is processed.
	                </div>
	
	                <div ng-show="recorder.isHtml5 && recorder.status.isRecording">
	                    <ng-audio-recorder-analyzer></ng-audio-recorder-analyzer>
	                </div>
	                <br/>
	
	                <div ng-show="!recorder.status.isRecording && recorder.audioModel">
	                    <ng-audio-recorder-wave-view wave-color="yellow" bar-color="red"></ng-audio-recorder-wave-view>
	                </div>
	            </div>
	
	            <h2 style="font-family: sans-serif; text-align: center; width: 60px; border-radius: 20px;
	        border: solid 2px #333; padding: 20px 10px;" ng-if="recorder.status.isRecording">
	                <% recorder.elapsedTime > 9 ? recorder.elapsedTime : ('0'+recorder.elapsedTime) %>
	            </h2>
	
	
	            <h2 style="font-family: sans-serif; text-align: center; border: solid 2px #333; padding: 20px 10px;"
	                ng-if="recorder.status.isRecording">
	                Remaining Time: <% recorder.timeLimit - recorder.elapsedTime %>
	            </h2>
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
</body>
</html>

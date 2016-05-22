@extends('layouts.master')

@section('title', 'Guitar loop recording')

@section('content')
<div class="record">

	<div class="title-section">
		<h1>RECORD</h1>
	</div>

	<div class="col-xs-12">
		<div ng-controller='RecordController'>
		    <ng-audio-recorder id="mainAudio" audio-model="recorded" show-player="false" time-limit="timeLimit">
		        <div ng-if="recorder.isAvailable">

		        	<a class="record-button btn-floating waves-effect waves-light btn-large red" ng-click="recorder.startRecord()" type="button" ng-hide="recorder.status.isDenied === true || recorder.status.isRecording || recorder.status.isConverting">
		        		<i class="fa fa-microphone"></i>
		        	</a>

		        	<a class="pauze-button btn-floating waves-effect waves-light btn-large red" ng-click="recorder.stopRecord()" type="button" ng-hide="recorder.status.isRecording === false">
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
		
		            <div ng-if="recorder.status.isDenied === true" style="color: red;">
		                You need to grant permission for this application to USE your microphone.
		            </div>

		            <a class="btn-floating waves-effect waves-light btn-large red" ng-click="recorder.status.isPlaying ? recorder.playbackPause() : recorder.playbackResume()" type="button" ng-disabled="recorder.status.isRecording || !recorder.audioModel" ng-class="{ 'disabled' : recorder.status.isRecording || !recorder.audioModel }">
		        		<i class="fa fa-<% recorder.status.isStopped || recorder.status.isPaused ? 'play' : 'pause' %>"></i>
		        	</a>

		        	<a class="btn-floating waves-effect waves-light btn-large red" ng-click="recorder.save()" ng-disabled="recorder.status.isRecording || !recorder.audioModel" ng-class="{ 'disabled' : recorder.status.isRecording || !recorder.audioModel }">
		        		<i class="fa fa-download"></i>
		        	</a>
		
		            <h2 ng-if="recorder.status.isRecording">
		                <% recorder.elapsedTime > 9 ? recorder.elapsedTime : ('0'+recorder.elapsedTime) %>
		            </h2>
		
		
		            <h2 ng-if="recorder.status.isRecording">
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
	</div>
</div>

@stop
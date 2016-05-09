@extends('layouts.master')

@section('title', 'Guitar loop recording')

@section('content')
<div class="record">
	<div class="col-xs-12">
		<div ng-controller='RecordController'>
		    <h1>Record your audio</h1>
		
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


			<button ng-click="startEdit()">Start Editing</button>

			<div id="peaks-container"></div>

		</div>
	</div>
</div>

@stop
gloopsApp.controller('RecordController', function ($scope, $timeout) {
  	console.log("Loaded");
  	$scope.timeLimit = 60;

  	$scope.startEdit = function() {

  		(function(Peaks){
		    $scope.peaks = Peaks.init({
		    	  /** REQUIRED OPTIONS **/
				  // Containing element
				  container: document.getElementById('peaks-container'),

				  // HTML5 Media element containing an audio track
				  mediaElement: document.querySelector('audio'),

				  // async logging function
				  logger: console.error.bind(console),

				  // default height of the waveform canvases in pixels
				  height: 200,

				  // Array of zoom levels in samples per pixel (big >> small)
				  zoomLevels: [512, 1024, 2048, 4096],

				  // Bind keyboard controls
				  keyboard: false,

				  // Keyboard nudge increment in seconds (left arrow/right arrow)
				  nudgeIncrement: 0.01,

				  // Colour for the in marker of segments
				  inMarkerColor: '#a0a0a0',

				  // Colour for the out marker of segments
				  outMarkerColor: '#a0a0a0',

				  // Colour for the zoomed in waveform
				  zoomWaveformColor: 'rgba(0, 225, 128, 1)',

				  // Colour for the overview waveform
				  overviewWaveformColor: 'rgba(0,0,0,0.2)',

				  // Colour for the overview waveform rectangle that shows what the zoom view shows
				  overviewHighlightRectangleColor: 'grey',

				  // Colour for segments on the waveform
				  segmentColor: 'rgba(255, 161, 39, 1)',

				  // Colour of the play head
				  playheadColor: 'rgba(0, 0, 0, 1)',

				  // Colour of the play head text
				  playheadTextColor: '#aaa',

				  // the color of a point marker
				  pointMarkerColor: '#FF0000',

				  // Colour of the axis gridlines
				  axisGridlineColor: '#ccc',

				  // Colour of the axis labels
				  axisLabelColor: '#aaa',

				  // Random colour per segment (overrides segmentColor)
				  randomizeSegmentColor: true,

				  // Zoom view adapter to use. Valid adapters are: 'animated' (default) and 'static'
				  zoomAdapter: 'animated',

				  // Array of initial segment objects with startTime and
				  // endTime in seconds and a boolean for editable.
				  // See below.
				  segments: [{
				    startTime: 120,
				    endTime: 140,
				    editable: true,
				    color: "#ff0000",
				    labelText: "My label"
				  },
				  {
				    startTime: 220,
				    endTime: 240,
				    editable: false,
				    color: "#00ff00",
				    labelText: "My Second label"
				  }]
		    });
			/*
				    p.on('segments.ready', function(){
			  // do something when segments are ready to be displayed
			});*/
		})(peaks.js);
		$scope.peaks.segments.add(0, 1, true);
  	}




})	
.config(function (recorderServiceProvider) {
    recorderServiceProvider
      .forceSwf(false)
      .withMp3Conversion(true);
});
<!DOCTYPE html>
<html>
  <head>
    <title>Peaks.js Demo Page</title>
    <style>
      #titles {
        font-family: 'Helvetica neue', Helvetica, Arial, sans-serif;
      }
      #titles, [id*="waveform-visualiser"] {
        margin: 24px auto;
        width: 1000px;
      }
      [id*="waveform-visualiser"] [class*="-container"] {
        box-shadow: 3px 3px 20px #919191;
        margin: 0 0 24px 0;
        -moz-box-shadow: 3px 3px 20px #919191;
        -webkit-box-shadow: 3px 3px 20px #919191;
        line-height: 0;
      }
      .overview-container {
        height: 85px;
      }
      #second-waveform-visualiser-container [class*="-container"] {
        background: #111;
      }
      #demo-controls {
        margin: 0 auto 24px auto;
        width: 1000px;
      }
      #demo-controls > * {
        vertical-align: middle;
      }
      #demo-controls button {
        background: #fff;
        border: 1px solid #919191;
        cursor: pointer;
      }
    </style>
  </head>
  <body>

      <div id="titles">
        <h1>Peaks.js Frontend Component Demo</h1>

        <p>Peaks is a modular frontend component designed for the display of and interaction with audio waveform material in the browser.</p>

        <p>Peaks was developed by <a href="http://www.bbc.co.uk/rd">BBC R&amp;D</a> to allow users to make accurate clippings of audio data over a timeline in browser by leveraging a backend API for encoding.</p>

        <p>Peaks utilizes HTML5 canvas technology to display waveform data at different zoom levels and provides some basic convenience methods for interacting with waveforms and creating time-based visual sections for denoting content to be clipped or for reference eg: distinguishing music from speech or identifying different music tracks.</p>
      </div>

      <div id="first-waveform-visualiser-container"></div>

      <div id="demo-controls">
        <audio controls=controls>
          <source src="http://localhost:8000/loops/main/loop-2.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>

        <button data-action="zoom-in">zoom in</button>
        <button data-action="zoom-out">zoom out</button>
        <button data-action="add-segment">Add a Segment at current time</button>
        <button data-action="add-point">Add a Point at current time</button>
        <button data-action="log-data">Log segments/points</button>
      </div>

      <script src="/bower_components/requirejs/require.js"></script>
      <script>
        requirejs.config({
		  paths: {
		    peaks: 'bower_components/peaks.js/src/main',
		    EventEmitter: 'bower_components/eventemitter2/lib/eventemitter2',
		    Kinetic: 'bower_components/KineticJS/kinetic',
		    'waveform-data': 'bower_components/waveform-data/dist/waveform-data.min'
		  }
		});
        // requires it
		require(['peaks'], function (Peaks) {
		  var p = Peaks.init({
		    container: document.querySelector('#peaks-container'),
		    mediaElement: document.querySelector('audio')
		  });

		  p.on('segments.ready', function(){
		    // do something when segments are ready to be displayed
		  });
		});
      </script>
  </body>
</html>
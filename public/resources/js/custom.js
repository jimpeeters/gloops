(function(window, document, $, undefined) {

	var project = {

		init: function() {

			project.viewport.init();

		},
		viewport: {
			init: function(){

				project.viewport.element = $(window);

				// get dimensions
				project.viewport.resize();

				// bind events
				project.viewport.element.bind('resize', project.viewport.resize);

			},
			resize: function(){

				// clear timer
				clearTimeout(project.viewport.resizeTimer);

				// get dimensions
				project.viewport.w = project.viewport.element.width();
				project.viewport.h = project.viewport.element.height();

				// set timer
				project.viewport.resizeTimer = setTimeout(function(){



				}, 60);

			}
		}

	};

	// Initialize project
	if(typeof(window.jQuery) === 'undefined' || typeof($) === 'undefined') { console.error('=== No jQuery defined ==='); return; }
	$(document).ready(project.init);

}(window, window.document, window.jQuery));
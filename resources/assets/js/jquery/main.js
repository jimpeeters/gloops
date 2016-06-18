$(document).ready(function () { 
    $('body').sectionScroll(); // Section scroll library

    $( "#activate-modal, #activate-modal-2" ).click(function() {
	    $( '#video-modal' ).openModal();
	});

	$('#jump-to-video').click(function (e) {
	    $('html, body').animate({
	        scrollTop: $("#gloops-video").offset().top
	    }, 'slow');
	});
}) 
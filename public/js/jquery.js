$( "#search-button" ).click(function() {

	if($("#search-input" ).hasClass( "closed" ))
	{
		//if screen is mobile
		if ($("#search-input").css("font-size") == "10px" )
		{
	    	$( "#search-input" ).animate({
		    	width: 150+'%',
			    paddingLeft: 80+'%',
			    border: 1
			}, 1000, function() {
			    $("#search-input").removeClass( "closed" );
			    $("#search-input").addClass( "open" );
			});
	    }
	    else
	    {
	    	$( "#search-input" ).animate({
		    	width: 150+'%',
			    paddingLeft: 40+'%',
			    border: 1
			}, 1000, function() {
			    $("#search-input").removeClass( "closed" );
			    $("#search-input").addClass( "open" ); 
	  		});
	    }

	}
	else
	{
	  $( "#search-input" ).animate({
		    	width: 0,
			    paddingLeft: 0,
			    border: 0
		}, 1000, function() {
		    $("#search-input").removeClass( "open" );
		    $("#search-input").addClass( "closed" ); 
		});
	}

});
$( "#register-now-button,#login-now-button" ).click(function() {

	if($(".register-modal" ).hasClass( "hidden" ))
	{
	  $( ".login-modal" ).addClass( "hidden" );
	  $( ".register-text" ).addClass( "hidden" );
	  $( ".register-modal" ).removeClass( "hidden" );
	  $( ".login-text" ).removeClass( "hidden" );
	  $( "#login-header-title").text( "Register");
	}
	else
	{
	  $( ".register-modal" ).addClass( "hidden" );
	  $( ".login-text" ).addClass( "hidden" );
	  $( ".login-modal" ).removeClass( "hidden" );
	  $( ".register-text" ).removeClass( "hidden" );
	  $( "#login-header-title").text( "Login");
	}
});

$(".chosen-select").chosen({
	max_selected_options:5, //Max select limit 
	display_selected_options:true,
	no_results_text:"Results not found", 
	width:"100%", 
});


$(".chosen-select-dropdown").chosen({
});
//# sourceMappingURL=jquery.js.map

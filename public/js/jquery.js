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
//# sourceMappingURL=jquery.js.map

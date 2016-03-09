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
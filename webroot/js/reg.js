jQuery(document).ready( function(){

	//$('.error-message').parent('div').addClass('error');




	$('#UserUsername').blur( function() {
		
		$('#usernameWrap').append('<div id="ajimg"><img src="/pvr/img/ajax-loader2.gif" /></div>');
		$('#usernameWrap .error-message').remove();
		$('#usernameWrap input').removeClass('form-error');		
		
		$('#response').remove();
		$('#usernameWrap').removeClass("error");
    		$.post(
	    		"userNameCheck",
	    		{"data[User][username]": $(this).attr('value') },
	        	function(data){
					$('#usernameWrap').append('<div id="response">'+data.hi+'</div>');
	        		if( data.typ == 0 ) {
	        			$('#usernameWrap').addClass("error");
	        			$('#response').addClass('error-message');
	        			$('#usernameWrap input').addClass('form-error');
	        		} else {
	        			$('#response').addClass('greenMessage');
	        			$('#response').css({'color':'green','font-weight':'bold'});
	        		}					
					$('#ajimg').remove();
	          	},
	          	"json"
          	);
        });

									
});

			
		
	



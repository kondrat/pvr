jQuery(document).ready( function(){

	$('.error-message').parent('div').addClass('error');




	$('#UserUsername').blur( function() {
		
		$('#usernameWrap').append('<div id="ajimg" class="span-5"><img src="/pvr/img/ajax-loader2.gif" /></div>');
		$('#usernameWrap .error-message').remove();
		$('#response').remove();
		$('#usernameWrap').removeClass("error");
    		$.post(
	    		"userNameCheck",
	    		{"data[User][username]": $(this).attr('value') },
	        	function(data){
					$('#usernameWrap').append('<div id="response" class="span-5">'+data.hi+'</div>');
	        		if( data.typ == 0 ) {
	        			$('#usernameWrap').addClass("error");
	        			$('#response').addClass('error-message');
	        		} else {
	        			//$('#response').addClass('greenMessage');
	        			$('#response').css({'color':'green','font-weight':'bold'});
	        		}					
					$('#ajimg').remove();
	          	},
	          	"json"
          	);
        });

									
});

			
		
	



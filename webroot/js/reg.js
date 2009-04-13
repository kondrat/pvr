jQuery(document).ready( function(){
	
	//alert(options);
	//alert( $.tester() );
	var passToCheck = null;
	var options = null;
	var settings = { validate: false, limit: 5, name: "foo",required: "This fieuired." };
	if( jQuery().messages ) {
		var options = $().messages();
	}

	var local = $.extend(settings, options);
	
	//alert(local['limit']);

	$('#UserPassword1').blur( function() {
		
		$('#passWrap .error-message').remove();
		$('#passWrap').removeClass("error");
		$('#passWrap input').removeClass('form-error');	
			
			if( $('#UserPassword1').val() == 0 ) {
					passToCheck = null
					$('#passWrap').append('<div id="passerror" class="error-message">'+local['required']+'</div>');
					$('#passWrap').addClass("error");
					$('#passWrap input').addClass('form-error');
					if( $('#UserPassword2').val() != 0 ) {
						tt();
					}
			} else if( $('#UserPassword1').val().length <= 2 || $('#UserPassword1').val().length >= 5 ) {
					passToCheck = null
					$('#passWrap').append('<div id="passerror" class="error-message">Must not be between 2 and 5 chars</div>');
					$('#passWrap').addClass("error");
					$('#passWrap input').addClass('form-error');
					if( $('#UserPassword2').val() != 0 ) {
						tt();
					}
			} else {
					passToCheck = $('#UserPassword1').val();
					if( $('#UserPassword2').val() != 0 ) {
						tt();
					}
						
			}

		}
	)

	function tt() {
			$('#pass2Wrap .error-message').remove();
			$('#pass2Wrap').removeClass("error");
			$('#pass2Wrap input').removeClass('form-error');
			//alert(passToCheck);
			if( $('#UserPassword1').val() != $('#UserPassword2').val() ) {
				$('#pass2Wrap').append('<div id="passerror" class="error-message">Passwords must be equal</div>');
				$('#pass2Wrap').addClass("error");
				$('#pass2Wrap input').addClass('form-error');
			}		
	}



	$('#UserPassword2').blur( function() {
		tt();			
		}
	)
	$('#UserPassword2').keyup( function() {
		tt();			
		}
	)



	$('#UserEmail').blur( function() {
			$('#emailWrap .error-message').remove();
			$('#emailWrap').removeClass("error");
			$('#emailWrap input').removeClass('form-error');
			
			if( $('#UserEmail').val() == 0 ) {
					$('#emailWrap').append('<div id="emailerror" class="error-message">Email must not be empty</div>');
					$('#emailWrap').addClass("error");
					$('#emailWrap input').addClass('form-error');

			} else {
					if ( /^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)$/i.test($('#UserEmail').val()) ) {
						$('#emailWrap .error-message').remove();
						$('#emailWrap').removeClass("error");
						$('#emailWrap input').removeClass('form-error');
					} else {
						$('#emailWrap').append('<div id="emailerror" class="error-message">Wrong email</div>');
						$('#emailWrap').addClass("error");
						$('#emailWrap input').addClass('form-error');
					}
			}
		}
	)


		$('.capReset p img, #capImg').click( function() {
				var Stamp = new Date();
				$('#capImg').hide().attr( {src: "/pvr/users/kcaptcha/"+Stamp.getTime()}).fadeIn('slow');
			}
		)

	

			$("form").submit(function() {
				$('#captchaWrap .error-message').remove();
				$('#captchaWrap').removeClass("error");
				$('#captchaWrap input').removeClass('form-error');
			  if ($("#UserCaptcha").val() == 0) {
			  	
						$('#captchaWrap').append('<div id="emailerror" class="error-message">Must not be empty</div>');
						$('#captchaWrap').addClass("error");
						$('#captchaWrap input').addClass('form-error');
					
					return false;
			  } else {
					//alert($("#UserUsername").val());
			 		return true;
			 	}
			});




	
	$('#UserUsername').blur( function() {

		$('#usernameWrap').append('<div id="ajimg"><img src="/pvr/img/ajax-loader3.gif" /></div>');
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
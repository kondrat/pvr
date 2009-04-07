jQuery(document).ready( function(){

				$("#UserRegForm").validate({
					
			    focusInvalid: false,
			    focusCleanup: true,
			    errorElement: "div",
			    errorClass: "error-message",
			    rules: {
	
				      UserEmail: {
				      	required: true,
				      	minlength: 2,
				      	email: true
				      }
			    },
			    messages: {
	
				     	UserEmail: {
				        required: "Нужно указать email адрес",
				        email: "Email адрес должен быть корректным"
				      }
			    }/*
			    errorPlacement: function(error, element) {
			      var er = element.attr("id");
			      error.appendTo( er );
			    }	 
			    */ 
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

			
		
	



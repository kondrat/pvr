jQuery(document).ready( function(){
	$('.addAlbum').click(function(){

		$(this).parents("form:first").ajaxSubmit({
			success: function(responseText, responseCode) {
					$('#ajax-save-message').hide().html(responseText).fadeIn();					
					//$('#ajax-save-message').fadeOut(5000);
				},
			resetForm: true
			});
		return false;
	})
});



jQuery(document).ready( function() {
	
		$('#tuda').click( function(){ $('#ttt').html('<img src="/pvr/img/ajax-loader.gif" />').hide().fadeIn('slow'); } );
		
		var oldImg = $('#mainImage').attr('src');
							
		$("#storyEditForm").ajaxForm({
			url: '/pvr/images/addAjax',	
			dataType:  'json',			
			success: 
					function(data) {
							$('#storyTextUpload').hide().css({'visibility' : 'visible'}).html("<p class='rounded' style='padding:5px;'>"+data.message+"</p>").fadeIn();

							$('#storyTextUpload').fadeOut(10000);
											 					
							$('#ttt').fadeOut(600);
							if( data.img != null) {
								
								$('#mainImage').attr({style: "width:"+data.imgWidth})
								$('#mainImage').attr({src: "/pvr/img/gallery1/"+data.path+"/"+data.img+".jpg"}).fadeTo(500,0).fadeTo(5000,1);
								var margin = '0 0 0 ' +((630 - data.imgWidth)/2) + 'px';
								var Op2style = 	{
													'margin':margin,
													'position':'absolute', 
													'float':'left',
													'width': data.imgWidth, 
													'height':'100%', 
													'background-color': '#eee', 
													'left': '0',
													'z-index':'90'
												}

								$('#op2').css(Op2style).hide().fadeTo(5000,0.7).fadeTo(5000,0.2);
								
								$("#slider ul").prepend("<li style='float:left;height: 75px; width: 75px;'></li>");

								$("#slider ul li:first").html("<img src='/pvr/img/gallery1/"+data.path+"/"+data.thumb+".jpg' />").hide().fadeIn(5000);

								var oldImg = $('#mainImage').attr('src');	
							} else {
								$('#mainImage').attr({src: oldImg }).fadeTo(5000,0.8);
								$('#op2').fadeTo(5000,0).fadeTo(5000,0.5);
							}
											
					},
			
			resetForm: true
				
		});

		return false;
		
	
} );

$(document).ready( function(){
  $('.rounded').corners('5px');
  //$('.rounded').corner();
});


$(document).ready(function(){	
	$("#slider").easySlider(			
		//prevText: '',
		//nextText: '',		
		//firstShow: true,
		//lastShow: true,
		//vertical: false, 
		//continuous: false 	
	);
});
$(document).ready( function(){
  $('.slider').draggable(); 
  $('.imgInput').draggable();
});
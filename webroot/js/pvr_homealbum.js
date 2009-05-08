
jQuery(document).ready( function() {
	
		$('#tuda').click( function(){ $('#ttt').html('<img src="'+path+'/img/ajax-loader.gif" />').hide().fadeIn('slow'); } );
		
		var oldImg = $('#mainImage').attr('src');
							
		$("#storyEditForm").ajaxForm({
			url: path+'/images/addAjaxHome',	
			dataType:  'json',			
			success: 
					function(data) {
							$('#storyTextUpload').hide().css({'margin':'5px 12px 10px 12px','visibility' : 'visible'}).html("<p style='margin: 0; padding:5px; '>"+data.message+"</p>").fadeIn();

							$('#storyTextUpload').fadeOut(7000);
											 					
							$('#ttt').fadeOut(600);
							if( data.img != null) {
								
								$('#mainImage').attr({style: "width:"+data.imgWidth})
								$('#mainImage').attr({src: path+"/img/gallery1/"+data.path+"/"+data.img+".jpg"}).fadeTo(500,0).fadeTo(5000,1);
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

								$("#slider ul li:first").html("<img src='"+path+"/img/gallery1/"+data.path+"/"+data.thumb+".jpg' />").hide().fadeIn(5000);

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
// Тест на юник
$(document).ready( function(){
  //$('.slider').draggable(); 
  //$('.imgInput').draggable();
	$('.lfs, .signup, .fastUpload').draggable();
});

$(function() {
	setInterval(
			function() {
				active = $('#slideshow img.active');
				active = active.length ? active : $('#slideshow img:last');
				next = active.next().length ? active.next() : $('#slideshow img:first');
				active.addClass('previous');
				anim = [{ opacity: 0.0 }, { opacity: 1.0 }];
				
				next.css(anim[0]).addClass('active').animate(anim[1], 1000, function() {
					active.removeClass('active previous');
				});
			},
			15000
	 );
});
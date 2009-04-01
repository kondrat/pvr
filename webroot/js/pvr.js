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

//'onClick'=>'$(\'#storyEditForm\').ajaxSubmit({target: \'#storyTextUpload\',url: \''.$html->url('/images/add').'\'}); return false;'

jQuery(document).ready( function() {
	
		$('#tuda').click( function(){ $('#ttt').html('<img src="/pvr/img/ajax-loader.gif" />').hide().fadeIn('slow'); } );
		var oldImg = $('#mainImage').attr('src');					
		$("#storyEditForm").ajaxForm({
			url: '/pvr/images/addAjax',	
			dataType:  'json',			
			success: 
					function(data) {
							$('#storyTextUpload').hide().html(data.message).fadeIn();

							$('#storyTextUpload').fadeOut(5000);
											 					
							$('#ttt').fadeOut(600);
							if( data.img != null) {

								$('#mainImage').attr({src: "/pvr/img/gallery1/"+data.path+"/"+data.img+".jpg"}).fadeTo(5000,0.8);
								$('#op2').fadeTo(1000,0).fadeTo(5000,0.5);
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

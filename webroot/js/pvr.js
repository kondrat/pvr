jQuery(document).ready( function(){

	$('.addAlbum').click(function(){

		$(this).parents("form:first").ajaxSubmit({
			success: function(responseText, responseCode) {
				$('#ajax-save-message').hide().html(responseText).fadeIn();
					setTimeout(function(){
									$('#ajax-save-message').fadeOut();
								}, 5000
					);
				},
			resetForm: true
			});
		return false;
	})
});

//'onClick'=>'$(\'#storyEditForm\').ajaxSubmit({target: \'#storyTextUpload\',url: \''.$html->url('/images/add').'\'}); return false;'

jQuery(document).ready( function(){

	$('#tuda').click(function(){

		$(this).parents("form:first").ajaxSubmit({
			url: '/pvr/images/addAjax',
			success: function(responseText, responseCode) {
				$('#storyTextUpload').hide().html(responseText).fadeIn();
					setTimeout(function(){
									$('#storyTextUpload').fadeOut();
								}, 50000
					);
				},
			resetForm: true
			});
		return false;
	})
});
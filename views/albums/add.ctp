<div class="albums form">
<?php echo $form->create('Album');?>
	<fieldset>
 		<legend><?php __('Add Album');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('image');
	?>
	</fieldset>
<?php echo $form->submit('Submit',array('class'=>'addAlbum') );?>
<?php echo $form->end();?>
<div id="ajax-save-message"></div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Albums', true), array('action'=>'index'));?></li>
	</ul>
</div>

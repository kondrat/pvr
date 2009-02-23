<div class="images form">
<?php echo $form->create('Image', array( 'type' => 'file') );?>
	<fieldset>
 		<legend><?php __('Add Image');?></legend>
	<?php
		echo $form->input('album_id');
		echo $form->input('name');
		echo $form->input('image');
		echo $form->input('Image.userfile', array('type'=>'file', 'label'=>__('Upload Image',true) ) );
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div id="uploadOutput"></div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Images', true), array('action'=>'index'));?></li>
	</ul>
</div>

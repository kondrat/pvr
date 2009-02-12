<div class="albums form">
<?php echo $form->create('Album');?>
	<fieldset>
 		<legend><?php __('Add Album');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('image');
		echo $form->input('image_count');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Albums', true), array('action'=>'index'));?></li>
	</ul>
</div>

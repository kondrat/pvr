<div class="images form">
<?php echo $form->create('Image');?>
	<fieldset>
 		<legend><?php __('Add Demo Photo');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('image');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Images', true), array('action'=>'index'));?></li>
	</ul>
</div>

<div class="images form">
<?php echo $form->create('Image',array('action'=>'addDemo', 'type' => 'file'));?>
	<fieldset>
 		<legend><?php __('Add Demo Photo');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('Image.userfile', array('type'=>'file', 'label'=>__('Image',true) ) );
	?>
	</fieldset>
<?php echo $form->end(__('Submit',true));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Images', true), array('action'=>'index'));?></li>
	</ul>
</div>

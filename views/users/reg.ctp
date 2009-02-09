<?php echo $form->create('User', array('action' => 'reg' ) ); ?>
		<?php echo $form->input('username', array('class' => 'form', 'size' => 36 ) ); ?>
        <?php echo $form->input('password1' , array('type' => 'password') ); ?>
		<?php echo $form->input('password2', array('type' => 'password' ) ); ?>
		<?php echo $form->input('group_id'); ?>
		<?php echo $form->input('email', array('class' => 'form', 'size' => 36 ) ); ?>
<?php echo $form->end('Submit'); ?>

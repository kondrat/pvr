<div class="inner_page">
	<h1> Pvr </h1>
	<?php echo $form->create('User', array('action' => 'login' ) ); ?>
	
	<fieldset>
	<legend>Вход: </legend>
		<?php echo $form->input('username', array('type' => 'text', 'size' => 20,'class' => 'form',  'label' => false) );?>
		<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>

		<?php echo $form->input('password', array( 'size' => 20,'class' => 'form',  'label' => false) );?>

		<p><?php echo $html->link("Забыли пароль?", array('admin'=> false, 'action' => 'reset'), array('class' => 'dm' ) ); ?></p>
		
		<?php //echo $html->link( 'Регистрация', array( 'action' => 'reg' ), array('class' => 'dm' ) ); ?>
	</fieldset>
	<?php echo $form->end( __("Login",true) ); ?>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		</p>
</div>
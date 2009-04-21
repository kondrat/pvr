<div class="inner_page">
	<?php if( !$session->check('Auth.User.id') ): ?>
	<div class="clearfix">
		<div class="push-1 span-6 append-1">
			<?php echo $form->create('User', array('action' => 'login' ) ); ?>		
			<fieldset>
				<legend><?php __('Login');?></legend>
				<?php echo $form->input('username', array('type' => 'text', 'size' => 20,'class' => 'form',  'label' => false) );?>
				<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>
		
				<?php echo $form->input('password', array( 'size' => 20,'class' => 'form',  'label' => false) );?>
		
				<p><?php echo $html->link(__('Forgot your password?',true), array('admin'=> false,'controller'=>'users','action' => 'reset'), array('class' => 'dm' ) ); ?></p>				
			</fieldset>
			<?php echo $form->end( __("Login",true) ); ?>
		</div>
		<div class="span-6">
			<div class="signup">
				<?php echo $html->link( __("Sign Up",true), array( 'controller'=>'users','action' => 'reg' ), array('class' => 'dm' ) ); ?>
			</div>
		</div>
	</div>
	<?php endif ?>

</div>
<div class="inner_page" style="background: url('./img/demo/99802-4a017ca29be4a-md.jpg') no-repeat	; width: 630px; height: 470px;">
	<div class="span-16">
		<div style="position: relative;">
		</div>
	</div>
	<?php //if( !$session->check('Auth.User.id') ): ?>
	
	<div class="clearfix">
		
		
		
		
		<div class="push-1 span-6 append-1 lfs" >
			<div class= "loginFormSlider rounded..">
					<?php echo $form->create('User', array('action' => 'login' ) ); ?>		
					
						
						<?php echo $form->input('username', array('type' => 'text', 'size' => 20,'class' => 'form',  'label' => __('Username',true)) );?>
						<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>
				
						<?php echo $form->input('password', array( 'size' => 20,'class' => 'form',  'label' => __('Password',true)) );?>
				
					
					<?php echo $form->end( __("Login",true) ); ?>
			</div>
			<div class="imgInputMove rounded.."><?php // __('Login');?></div>
			<p><?php echo $html->link(__('Forgot your password?',true), array('admin'=> false,'controller'=>'users','action' => 'reset'), array('class' => 'dm' ) ); ?></p>				

		</div>
		
		
		
		<div class="span-6">
			<div class="signup">
				<div class="innerSignup"><?php echo $html->link( __("Sign Up",true), array( 'controller'=>'users','action' => 'reg' ), array('class' => 'dm' ) ); ?></div>
			</div>
		</div>
	</div>
	
	<?php //endif ?>

</div>
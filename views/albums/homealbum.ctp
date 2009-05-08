<?php echo $javascript->link('pvr_homealbum',false);?>

<div class="inner_page" >
	<div id="slideshow">
			<?php echo $html->image('demo/99802-4a017ca29be4a-md.jpg',array('class'=>'demoImg')); ?>
			<?php echo $html->image('demo/51623-4a02c1542255f-md.jpg',array('class'=>'demoImg')); ?>
			<?php echo $html->image('demo/52425-4a02c176bbb76-md.jpg',array('class'=>'demoImg')); ?>
			<?php echo $html->image('demo/51874-4a02c18f063e2-md.jpg',array('class'=>'demoImg')); ?>
			<?php echo $html->image('demo/55041-4a02c19d31b19-md.jpg',array('class'=>'demoImg')); ?>
	</div>
	<div class="span-16">
		<div style="position: relative;"></div>
	</div>

	
	<div class="clearfix">
		
		
		
		
			<div class="push-1 span-6 append-1 lfs" >
				<div class= "loginFormSlider">
							<div class="loginFormInput clearfix">					
						<?php echo $form->create('User', array('action' => 'login' ) ); ?>		

							<?php echo $form->input('username', array('type' => 'text', 'size' => 20,'class' => 'form',  'label' => __('Username',true)) );?>
	
						
							<?php echo $form->error( 'username', array('class' => 'error', 'style' => 'color: red') ); ?>
						
							<?php echo $form->input('password', array( 'size' => 20,'class' => 'form',  'label' => __('Password',true)) );?>
						</div>
						
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
			
			<div class="span-6">
				<div class="fastUpload">
						<div class="uploadNow"><?php __('Upload now (without registration)');?></div>
						<?php echo $form->create('Image', array( 'name'=>'storyEditForm','id'=>'storyEditForm', 'type' => 'file') );?>
							<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>false ) ); ?>
							<?php if( isset($guestKey) ): ?>
								<?php echo $form->hidden( 'key', array('value'=> $guestKey) ); ?>
							<?php endif ?>
							<?php echo $form->submit(__('Upload',true),array('id' => 'tuda') );?>
						<?php echo $form->end();?>
						<div class="imgInputMove"><?php //__('Move');?></div>
						<div class="" style="visibility: hidden;" id="storyTextUpload"></div>
				</div>
			</div>
					

	
<!--Тест Ю -->

</div>
<?php echo $javascript->link(array('reg','localization/messages_ru'),false);?>

<div class="inner_page">
	<fieldset>
		<legend><?php __('Sign Up');?></legend>
		<?php echo $form->create('User', array('action' => 'reg' ) ); ?>
	
	
					<?php echo $form->input('username', array('div'=>array("id"=>"usernameWrap","class"=>"formWrap"),'label'=>__('Username',true) ) ); ?>
	
	
					<?php echo $form->input('password1' , array('type' => 'password','div'=>array("id"=>"passWrap","class"=>"formWrap"), 'label'=>__('Password',true) ) ); ?>
	
	
					<?php echo $form->input('password2' , array('type' => 'password','div'=>array("id"=>"pass2Wrap","class"=>"formWrap"), 'label'=>__('Confirm Password',true) ) ); ?>
	
	
					<?php echo $form->input('email' , array('div'=>array("id"=>"emailWrap","class"=>"formWrap"),"class"=>"email required", 'label'=>__('Email',true) ) ); ?>
					
					<div class="capchaImg clearfix">
	
						<div class="capPlace"><?php echo $html->image( array('controller'=>'users','action'=>'kcaptcha',time() ),array('id'=>'capImg') );?></div>

						
						<div class="capReset">
							<p><?php echo $html->image('icons/001_39.png');?></p>
						</div>
					</div>					
					
					<?php echo $form->input('captcha', array('div'=> array("id"=>"captchaWrap","class"=>"formWrap"), 'label' => 'Please type the text') );	?>

					<?php echo $form->input('group_id' , array('div'=>array("id"=>"groupWrap","class"=>"formWrap"), 'label'=>__('group_id',true) ) ); ?>
	
		</fieldset>	
				<div class="submit clearfix">	
					<?php echo $form->button( __('Submit',true), array('type'=>'submit', 'id'=>'regSubmit','class'=>'span-3') ); ?>
				</div>
		
	<?php echo $form->end(); ?>
</div>


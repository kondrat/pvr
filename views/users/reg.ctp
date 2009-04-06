
<?php echo $javascript->link('reg',false);?>
<div class="inner_page">
	<h2><?php __('Sign Up');?></h2>
	<?php echo $form->create('User', array('action' => 'reg' ) ); ?>
		<div class="input text required clearfix" id="usernameWrap">
			<div class="labak span-3">
				<?php echo $form->label('username',__('Username',true));?>
			</div>
			<div class="span-6 last">
				<?php echo $form->input('username', array('div'=>false, 'label'=>false,'error'=>false ) ); ?>
			</div>
			
				<?php echo $form->error('username',null,array());?>
			
		</div>
		
		<div class="input text required clearfix" id="passWrap">
			<div class="labak span-3">
				<?php echo $form->label('password',__('Password',true));?>
			</div>
			<div class="span-6 last">
				<?php echo $form->input('password1' , array('type' => 'password','div'=>false, 'label'=>false,'error'=>false ) ); ?>
			</div>
			
				<?php echo $form->error('password1');?>
			
		</div>		
		
		<div class="input text required clearfix" id="pass2Wrap">
			<div class="labak span-3">
				<?php echo $form->label('password2',__('Confirm Password',true));?>
			</div>
			<div class="span-6 last">
				<?php echo $form->input('password2' , array('type' => 'password','div'=>false, 'label'=>false,'error'=>false ) ); ?>
			</div>
			
				<?php echo $form->error('password2');?>
			
		</div>		

			
		<div class="input text required clearfix" id="emailWrap">
			<div class="labak span-3">
				<?php echo $form->label('email',__('Email',true));?>
			</div>
			<div class="span-6 last">
				<?php echo $form->input('email' , array('div'=>false, 'label'=>false,'error'=>false ) ); ?>
			</div>
			
				<?php echo $form->error('email');?>
			
		</div>	
		
		
			        
		<div class="input text required clearfix" id="groupWrap">
			<div class="labak span-3">
				<?php echo $form->label('group_id',__('group_id',true));?>
			</div>
			<div class="span-6 last">
				<?php echo $form->input('group_id' , array('div'=>false, 'label'=>false ) ); ?>
			</div>
		</div>	
		
		<div class=" clearfix">	
			<?php echo $form->button( __('Submit',true), array('type'=>'submit', 'id'=>'regSubmit','class'=>'span-3') ); ?>
		</div>

	<?php echo $form->end(); ?>
</div>


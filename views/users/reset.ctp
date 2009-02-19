<div class="inner_page">
	<?php echo $form->create('User', array('action' => 'reset','class' => 'styled account_form') ); ?>
              	<div > <?php __('Enter your E-mail');?></div>
				<br />
         			
          			<?php echo $form->text('email', array('size' => 60) ); ?>
          			
          			<?php echo $form->error( 'email', array('class' => 'error', 'style' => 'color: red') ); ?>	

				<p>
          			<?php echo $form->submit(__('Send me new password',true), array ('class' => 'submit1') ); ?>
          		</p>
	<?php echo $form->end(); ?>
</div>





<?php $this->pageTitle = 'Admin page'; ?>

	<br />
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em"> <?php __('Demo album control');?> </p>
		<?php echo $html->link(__('Show me albums',true), array('controller' => 'albums', 'action' => 'index') ) ?>
			<br />
		<?php echo $html->link(__('Add Demo photo',true), array('controller' => 'images', 'action' => 'addDemo') ) ?>	
	</div>	
	
		<hr />	
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em"><?php __('Admin data');?></p>
		<?php echo $html->link(__('Reset Password',true), array('controller' => 'users', 'action' => 'newpassword') ) ?>
		<br />
		<?php echo $html->link(__('Show me data',true), array('controller' => 'users', 'action' => 'view') ) ?>	
	</div>
		
		<hr />		
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em"><?php __('Cache control');?></p>
		<?php echo $html->link(__('Clear Cache',true), array('controller' => 'users', 'action' => 'clearcache') ) ?>	
	</div>
	
		<br />			
		




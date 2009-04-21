<?php $this->pageTitle = 'Admin page'; ?>

	<br />
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em"> Управление Demo ФотоАльбомом </p>
		<?php echo $html->link('Посмотреть альбомы', array('controller' => 'albums', 'action' => 'index') ) ?>
			<br />
		<?php echo $html->link(__('Add Demo photo',true), array('controller' => 'images', 'action' => 'add') ) ?>	
	</div>	
	
		<hr />	
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em">Данные администратора</p>
		<?php echo $html->link('Изменить пароль', array('controller' => 'users', 'action' => 'newpassword') ) ?>
		<br />
		<?php echo $html->link('Посмотреть данные', array('controller' => 'users', 'action' => 'view') ) ?>	
	</div>
		
		<hr />		
	<div class="mainAdminPage">
		<p style="margin-bottom: 0.5em"> Управление кешированием</p>
		<?php echo $html->link('Отчистить Cache', array('controller' => 'users', 'action' => 'clearcache') ) ?>	
	</div>
	
		<br />			
		




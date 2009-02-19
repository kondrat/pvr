<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('pvr:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('pvr');
		echo $html->css('screen');
		//echo $html->css('print');
		echo '<!--[if IE]>';
		echo $html->css('ie');
		echo '<![endif]-->';
		//echo $html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div class="container showgrid">

			<div class="span-24">

		    	<p>
		    		<?php 
		    			echo $html->link(__('Home',true),array('controller'=>'pages','action'=>'display')).'&nbsp';
		    			echo $html->link('login',array('controller'=>'users','action'=>'login')).'&nbsp';
		    			if ( $session->check('Auth.User.id') ){
		    				echo $html->link('logout',array('controller'=>'users','action'=>'logout')).'&nbsp';
		    			}
		    			echo $html->link('group',array('controller'=>'groups','action'=>'index')).'&nbsp';
		    			echo $html->link('album',array('controller'=>'albums','action'=>'index')).'&nbsp';
		    			echo $html->link('image',array('controller'=>'images','action'=>'index')).'&nbsp';
		    		?>
		    	</p>
		    </div>
		    <div class="span-4">
		        Left sidebar
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		    </div>
		
		    <div class="span-16">
		    	<div class="clearfix">
			        <div class="span-8">
			            <div style="background-color: #ccc; padding-left: 20px;">
							<?php
								//debug($this->params);
								if ($session->check('Auth.User.username')) {
									echo '<b>&laquo;'.$session->read('Auth.User.username').'&raquo;</b>';
								} else {
									echo 'Username';
								}
							?>
						</div>
			      	</div>
			        <div class="span-4">
			       		Box2
			        </div>
			        <div class="span-4 last">
			            Box3
			        </div>
			   	</div>

		        <div class="span-16 last">
					<?php $session->flash(); ?>
					<?php
						if ($session->check('Message.auth')) {						
								$session->flash('auth',array('class'=>'error'));							
						}
					?>

					<?php echo $content_for_layout; ?>
		        </div>
		    </div>
		
		    <div class="span-4 last">
		        Right sidebar
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		    </div>


	

		    <div class="span-24">
		        Footer
		    </div>
		
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
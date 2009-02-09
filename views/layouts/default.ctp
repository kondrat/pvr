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
		        <div style="margin: 10px 0 50px 50px;">Header</div>
		    </div>
		    <div class="span-4">
		        Left sidebar
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
		    </div>
		
		    <div class="span-16">
		    	<div class="clearfix">
			        <div class="span-8">
			            <div style="background-color: #ccc; padding-left: 20px;">Box1</div>
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
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
			<h3>Pvr</h3>
		</div>

		   <div class="span-24">
		        Header
		    </div>
		    <div class="span-4">
		        Left sidebar
		    </div>
		
		    <div class="span-16">
		        <div class="span-8">
		            Box1
		        </div>
		        <div class="span-4">
		            Box2
		        </div>
		        <div class="span-4 last">
		            Box3
		        </div>
		        <div class="span-16 last">
					<?php $session->flash(); ?>
		
					<?php echo $content_for_layout; ?>
		        </div>
		    </div>
		
		    <div class="span-4 last">
		        Right sidebar
		    </div>


	

		    <div class="span-24">
		        Footer
		    </div>
		
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
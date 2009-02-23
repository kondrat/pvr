
<h2><?php __('User Album');?></h2>
	<div class="clearfix">
		<div class="span-3 push-1">
			<div class="album">
				<?php echo $html->link( $html->image( 'gallery/s/'.$albums['Album']['image'], array('alt' => $albums['Album']['name'], 'class' => 'album')), array('controller' => 'images', 'action' => 'index',$albums['Album']['id']),null, null, false ); ?>
			</div>
			<p class="album_p"> Фотографий:&nbsp;<?php echo $albums['Album']['image_count'];?></p>
			<p>
				<span class="album_span"><?php echo $albums['Album']['name']; ?></span>
			</p>		
		</div>
		<div class="span-2">
			<p><?php echo $html->link(__('View', true), array('action'=>'view', $albums['Album']['id'])); ?></p>
			<p><?php echo $html->link(__('Edit', true), array('action'=>'edit', $albums['Album']['id'])); ?></p>
			<p><?php echo $html->link(__('Delete', true), array('action'=>'delete', $albums['Album']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $albums['Album']['id'])); ?></p>
		</div>
		<div class="span-10 last">
			<?php echo $form->create('Image', array( 'name'=>'storyEditForm','id'=>'storyEditForm', 'type' => 'file') );?>
				<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>__('Upload Image',true) ) ); ?>
				<?php echo $form->hidden( 'album_id', array('value'=>$albums['Album']['id']) ); ?>
				<?php echo $form->button('Upload Text',array('onClick'=>'$(\'#storyEditForm\').ajaxSubmit({target: \'#storyTextUpload\',url: \''.$html->url('/images/add').'\'}); return false;')); ?>
			<?php echo $form->end();?>
		</div>	
		<div id="storyTextUpload"></div>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Album', true), array('action'=>'add')); ?></li>
		</ul>
	</div>



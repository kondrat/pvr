
<h2><?php __('User Album');?></h2>
	<div class="clearfix">
		<div class="span-16 imageBack" style="">
			<div style="position: relative;">
				<div style="z-index: 1;  position: relative;">				
					<div style="position:absolute; float: left; height:470px; width: 630px;background-color: #333; opacity: 0.5;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); top: 100px, left: 0px;z-index: 90"></div>
					<?php if( isset($currentAlbum['Image']['1']['image']) && $currentAlbum['Image']['0']['image'] != null ): ?>
						<div><?php echo $html->image('gallery/b/'.$currentAlbum['Image']['1']['image'],array('style'=>'','height'=>'470px','weight'=>'630px;') );?></div>
					<?php else: ?>
						<div><?php echo $html->image('backImg.jpg',array('style'=>'','height'=>'470px','weight'=>'630px;') );?></div>
					<?php endif ?>
					
				</div>
				<div class="span-10 prepend-8 last" style="position:absolute; top: 30px; right: 0px; z-index: 20;">
					<?php echo $form->create('Image', array( 'name'=>'storyEditForm','id'=>'storyEditForm', 'type' => 'file') );?>
						<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>__('Upload Image',true) ) ); ?>
						<?php echo $form->hidden( 'album_id', array('value'=>$currentAlbum['Album']['id']) ); ?>
						<?php //echo $form->button('Upload Text',array('onClick'=>'$(\'#storyEditForm\').ajaxSubmit({target: \'#storyTextUpload\',url: \''.$html->url('/images/add').'\'}); return false;')); ?>
						<?php echo $form->submit('tuda',array('id' => 'tuda') );?>
					<?php echo $form->end();?>
					<div id="storyTextUpload"></div>
				</div>
				
			</div>	
		</div>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Album', true), array('action'=>'add')); ?></li>
		</ul>
	</div>



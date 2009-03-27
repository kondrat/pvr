
<h2><?php __('User Album');?></h2>
	<div class="clearfix">
		<div class="span-16 imageBack" style="">
			<div style="position: relative;">
				<div style="z-index: 1;  position: relative;">				
					<div id="op2" style="position:absolute; float: left;width: 630px; height:100%;background-color: #333; opacity: 0.3;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); top: 100px, left: 0px;z-index: 90"></div>
					<?php if( isset($currentAlbum['Image']) && $currentAlbum['Image'] != array() ): ?>
						<?php 
							$b =  array_pop($currentAlbum['Image']) ;
							$c = unserialize($b['image']);
							if ( isset($c['img']['md']) && $c['img']['md'] != array() ) {
								$img = $c['img']['img'].'-md.jpg';
								$width = $c['img']['md']['width'];
							} else {
								$img = $c['img']['img'].'-lrg.jpg';
								$width = $c['img']['lrg']['width'];
							}
							debug($img);
						?>						
								<div>
									<p>
										<?php echo $html->image('gallery1/'.$path.'/'.$img,array('style'=>'width:'.$width.'px','id'=>'mainImage',"class"=>"centerImg") );?>
									</p>
								</div>							
					<?php else: ?>
						<div style="height:470px; width:630px;"><?php echo $html->image('backImg.jpg',array('style'=>'','height'=>'470px','weight'=>'630px;','id'=>'mainImage') );?></div>
					<?php endif ?>
					
				</div>
				<div class="span-10 prepend-8 last" style="position:absolute; top: 30px; right: 0px; z-index: 20;">
				
					<div class="imgInput rounded">
						<?php echo $form->create('Image', array( 'name'=>'storyEditForm','id'=>'storyEditForm', 'type' => 'file') );?>
							<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>__('Upload Image',true) ) ); ?>
							<?php if( isset($currentAlbum['Album']['id']) ): ?>
								<?php echo $form->hidden( 'album_id', array('value'=> $currentAlbum['Album']['id']) ); ?>
							<?php endif ?>
							<?php echo $form->submit('tuda',array('id' => 'tuda') );?>
						<?php echo $form->end();?>
					</div>
					
					<div id="storyTextUpload"></div>
				</div>
				<div id="ttt" style="position:absolute; top: 230px; right: 200px; z-index: 30;"></div>
			</div>	
		</div>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Album', true), array('action'=>'add')); ?></li>
		</ul>
	</div>



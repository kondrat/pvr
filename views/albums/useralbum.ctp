	<div class="clearfix">
		<div class="span-16 imageBack" style="">
			<div style="position: relative;">
				<div style="z-index: 1;  position: relative;">				

						<?php if( isset($currentAlbum['Image']) && $currentAlbum['Image'] != array() ): ?>
						<?php 
							$withFirst = $currentAlbum['Image'];
							$b =  array_pop($currentAlbum['Image']) ;
							$c = unserialize($b['image']);
							if ( isset($c['img']['md']) && $c['img']['md'] != array() ) {
								$img = $c['img']['img'].'-md.jpg';
								$width = $c['img']['md']['width'];
							} else {
								$img = $c['img']['img'].'-lrg.jpg';
								$width = $c['img']['lrg']['width'];
							}
							//debug($img);
						?>

						<div id="op2"></div>
						
								<div>
									<p>
										<?php echo $html->image('gallery1/'.$path.'/'.$img,array('style'=>'width:'.$width.'px','id'=>'mainImage',"class"=>"centerImg") );?>
									</p>
								</div>
								<div class="slider rounde...">
									<div class="insideSlider rounded." style="" id="slider">								
										<ul>
										<?php //$withFirst = reset($currentAlbum['Image']);?>
										<?php foreach( array_reverse( $withFirst ,true ) as $imagSq ): ?>
											<?php $im = unserialize($imagSq['image']); ?>	
											<li>								
												<?php echo $html->image( 'gallery1/'.$path.'/'.$im['img']['img'].'-sq.jpg',array() ); ?>
											</li>
											<?php //debug($image);?>
										<?php endforeach ?>	
										</ul>							
									</div>
								</div>
							
					<?php else: ?>
						<div><p><?php echo $html->image('backImg.jpg',array('style'=>'','id'=>'mainImage','class'=>'centerImg') );?></p></div>
					<?php endif ?>

				</div>
				<div class="span-12 prepend-8 last" style="position:absolute; top: 30px; right: 0px; z-index: 20;">
					
					<div class="imgInput rounded." >
						<?php echo $form->create('Image', array( 'name'=>'storyEditForm','id'=>'storyEditForm', 'type' => 'file') );?>
							<?php echo $form->input('Image.userfile', array('type'=>'file', 'label'=>false ) ); ?>
							<?php if( isset($currentAlbum['Album']['id']) ): ?>
								<?php echo $form->hidden( 'album_id', array('value'=> $currentAlbum['Album']['id']) ); ?>
							<?php endif ?>
							<?php echo $form->submit(__('Upload',true),array('id' => 'tuda') );?>
						<?php echo $form->end();?>
						<div class="imgInputMove rounded."><?php __('Move');?></div>
						<div class="rounded" style="visibility: hidden;" id="storyTextUpload"></div>
					</div>
					
					
				</div>
				<div id="ttt" style="position:absolute; top: 230px; right: 250px; z-index: 30;"></div>
			</div>	
		</div>
	</div>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Album', true), array('action'=>'add')); ?></li>
		</ul>
	</div>

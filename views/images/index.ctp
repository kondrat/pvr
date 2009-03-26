<div class="images index">
<h2><?php __('Images');?></h2>
<img src="http://lh3.ggpht.com/_0IFzeozlLnY/SbGPJv0_ZGI/AAAAAAAAEC0/-4wrRJe4T3w/s288/IMG_2997-1.JPG" />
<img src="http://lh4.ggpht.com/_0IFzeozlLnY/SbGPhWLxdOI/AAAAAAAAEDY/mHS7r3O0EU0/s288/IMG_3006.JPG" />
<p>
	<iframe src="http://www.digitalia.be/software/slimbox2#demo" scrolling="no" width="520" height="460" align="center"></iframe>
</p>

<p>
	<?php
		echo $paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true) ) );
	?>
</p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('album_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('image');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($images as $image):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $image['Image']['id']; ?>
		</td>
		<td>
			<?php echo $image['Image']['album_id']; ?>
		</td>
		<td>
			<?php echo $image['Image']['name']; ?>
		</td>
		<td>
			<?php echo $image['Image']['image']; ?>
		</td>
		<td>
			<?php echo $image['Image']['created']; ?>
		</td>
		<td>
			<?php echo $image['Image']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $image['Image']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $image['Image']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $image['Image']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $image['Image']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Image', true), array('action'=>'add')); ?></li>
	</ul>
</div>

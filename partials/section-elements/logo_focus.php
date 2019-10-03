<?php 
$size = get_sub_field('item_columns');
$size .= " ";
$size .= get_sub_field('item_rows');?>


<div class="se_logo <?=$size;?>">
	<img src="<?php echo get_sub_field('logo_image')['url'];?>" />
	<?php if(get_sub_field('title')) { ?>
		<h3><?php echo get_sub_field('title');?></h3>
	<?php } 

	if(get_sub_field('content')) { ?>
		<p><?php the_sub_field('content');?></p>
	<?php } ?>
</div>
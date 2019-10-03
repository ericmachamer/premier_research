<?php 
$size = get_sub_field('item_columns');
$size .= " ";
$size .= get_sub_field('item_rows');

?>
<div class="composition se_item <?=$size;?>">
	<?php the_sub_field('content');?>
</div>

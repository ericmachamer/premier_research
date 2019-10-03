<?php 
$size = get_sub_field('item_columns');
$size .= " ";
$size .= get_sub_field('item_rows');

if(have_rows('calls_to_action')){ ?>
	<div class="calls-to-action se_item <?=$size;?>">
		<?php while(have_rows('calls_to_action')) { the_row(); ?>
			<?php $link = get_sub_field('link');?>
			<a href="<?=$link['url'];?>" target="<?=$link['target'];?>" class="call-to-action <?php the_sub_field('style');?>">
				<?=$link['title'];?>
			</a>
		<?php } ?>
	</div>
<?php } ?>
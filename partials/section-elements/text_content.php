<?php 
$classes = 	get_sub_field('align_text');
$classes .=	" ";
$classes .=	get_sub_field('font');
$classes .=	" ";
$classes .=	get_sub_field('item_rows');
$classes .= " ";
$classes .=	get_sub_field('item_columns');
?>

<div class="se_text_content <?=$classes;?>">
	<?php if(get_sub_field('above_headline')) { ?>
		<?php $classes = get_sub_field('above_headline_size') . " " . get_sub_field('above_headline_font') . " " . get_sub_field('above_headline_brightness');?>
		<span class="above_headline <?=$classes;?>">
			<?php the_sub_field('above_headline');?>
		</span>
	<?php } ?>
	<?php if(get_sub_field('headline')){ ?>
		<?php $classes = get_sub_field('headline_size') . " " . get_sub_field('headline_font') . " " . get_sub_field('headline_brightness');?>
		<span class="headline <?=$classes;?>">
			<?php the_sub_field('headline');?>
		</span>
	<?php } ?>
	<?php if(get_sub_field('below_headline')) { ?>
		<?php $classes = get_sub_field('below_headline_size') . " " . get_sub_field('below_headline_font') . " " . get_sub_field('below_headline_brightness');?>
		<span class="below_headline <?=$classes;?>">
			<?php the_sub_field('below_headline');?>
		</span>
	<?php } ?>
	<?php if(get_sub_field('blurb')) { ?>
		<?php $classes = get_sub_field('blurb_size_font_size') . " " . get_sub_field('blurb_font') . " " . get_sub_field('blurb_brightness');?>
		<span class="blurb <?=$classes;?>">
			<?php the_sub_field('blurb');?>
		</span>
	<?php } ?>
	<?php if(have_rows('calls_to_action')){ ?>
		<div class="calls-to-action">
			<?php while(have_rows('calls_to_action')) { the_row(); ?>
				<?php $link = get_sub_field('link');?>
				<a href="<?=$link['url'];?>" target="<?=$link['target'];?>" class="call-to-action <?php the_sub_field('style');?>">
					<?=$link['title'];?>
				</a>
			<?php } ?>
		</div>
	<?php } ?>
</div>
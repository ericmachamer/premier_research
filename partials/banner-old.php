	<div class="page-banner <?php if(get_field('full_window')) { echo 'full-window';}?>">

		<?php if(get_field('background_image')) {
			$bg = get_field('background_image');?>
			<img src="<?=$bg['url'];?>" class="bg-image bg-obj" />
		<?php } ?>
		<?php if(get_field('background_image_mobile')) {
			$bg = get_field('background_image_mobile');?>
			<img src="<?=$bg['url'];?>" class="bg-image-mobile bg-obj" />
		<?php } ?>
		

		<?php if(get_field('background_video_mp4') || get_field('background_video_ogg')) { ?>
			<div class="bg-video-wrap bg-obj">
				<video class="bg-video bg-obj" autoplay loop muted >
				  <source src="<?php echo get_field('background_video_mp4')['url'];?>" type="video/mp4">
				  <source src="<?php echo get_field('background_video_ogg')['url'];?>" type="video/ogg">		
				</video>
			</div>
		<?php } ?>
		<div class="page-banner-slides">
			<?php while(have_rows('banner')) { the_row(); ?>
				<?php $classes = get_sub_field('align_text') . " " . get_sub_field('overlay') . " " . get_sub_field('font') . " " . get_sub_field('box_size') . " " . get_sub_field('place_box') . " " . get_sub_field('section_layout');?>
				<div class="banner_item <?=$classes;?>">

					<?php if(get_sub_field('background_video_mp4') || get_sub_field('background_video_ogg')) { ?>
						<div class="bg-video-wrap bg-obj">
							<video class="bg-video" autoplay loop muted >
							  <source src="<?php echo get_sub_field('background_video_mp4')['url'];?>" type="video/mp4">
							  <source src="<?php echo get_sub_field('background_video_ogg')['url'];?>" type="video/ogg">		
							</video>
						</div>
					<?php } ?>


					<?php if(get_sub_field('background_image')) {
						$bg = get_sub_field('background_image');?>
						<img src="<?=$bg['url'];?>" class="bg-image bg-obj" />
					<?php } ?>
					<?php if(get_sub_field('background_image_mobile')) {
						$bg = get_sub_field('background_image_mobile');?>
						<img src="<?=$bg['url'];?>" class="bg-image-mobile bg-obj" />
					<?php } ?>
					




					<div class="banner-content">

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
							<?php $classes = get_sub_field('blurb_size') . " " . get_sub_field('blurb_font') . " " . get_sub_field('blurb_brightness');?>
							<span class="blurb <?=$classes;?>">
								<?php the_sub_field('blurb');?>
							</span>
						<?php } ?>
						<?php if(have_rows('calls_to_action')){ ?>
							<div class="calls-to-action">
								<?php while(have_rows('calls_to_action')) { the_row(); ?>
									<?php $link = get_sub_field('link');?>
									<a href="<?=$link['url'];?>" target="<?=$link['target'];?>" class="btn <?php the_sub_field('style');?>">
										<?=$link['title'];?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>				
					
				</div>
			<?php } ?>
		</div>
	</div>
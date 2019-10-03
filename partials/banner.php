<?php if(have_rows('banner')){ ?>
	<div class="banner">
		<div class="banner__slides">
			<?php while(have_rows('banner')) { the_row(); ?>
				<?php
					$variations = [
						get_sub_field('align_text'),
						get_sub_field('overlay'),
						get_sub_field('place_box'),
						get_sub_field('font'),
						get_sub_field('box_size'),
					];

					ob_start();

					foreach($variations as $variation) {
						echo " banner__slide--" . $variation;
					}

					$classes = ob_get_clean();
				?>
				<div class="banner__slide header-gap <?=$classes;?>">

					<?php if(get_sub_field('background_image')) {
						$bg = get_sub_field('background_image');?>
						<img src="<?=$bg['url'];?>" class="banner__background" />
					<?php } ?>
					<?php if(get_sub_field('background_image_mobile')) {
						$bg = get_sub_field('background_image_mobile');?>
						<img src="<?=$bg['url'];?>" class="banner__background--mobile" />
					<?php } ?>

					<?php if(get_sub_field('background_video_mp4') || get_sub_field('background_video_ogg')) { ?>
						<video class="banner__background" autoplay loop muted >
						  <source src="<?php echo get_sub_field('background_video_mp4')['url'];?>" type="video/mp4">
						  <source src="<?php echo get_sub_field('background_video_ogg')['url'];?>" type="video/ogg">		
						</video>
					<?php } ?>

					<div class="banner__content">
						<?php 
						$items = ['above_headline', 'headline', 'below_headline', 'blurb'];
						$parts = ['brightness', 'size', 'font'];
						foreach($items as $item) {			

							if(get_sub_field($item)) {
								$classes = "";
								foreach($parts as $part) {
									$classes .= " banner__text-content--" . get_sub_field($item . "_" . $part);
								} ?>

								<span class="banner__text-content banner__<?=$item;?> <?=$classes;?>">
									<?php the_sub_field($item);?>
								</span>
							<?php } ?>
						<?php } ?>
											
						<?php if(have_rows('calls_to_action')){ ?>										
							<div class="calls-to-action">
								<?php while(have_rows('calls_to_action')) { the_row(); ?>
									<?php $link = get_sub_field('link');?>
									<a href="<?=$link['url'];?>" target="<?=$link['target'];?>" class="btn btn--<?php the_sub_field('style');?>">
										<?=$link['title'];?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>

			<?php }?>
		</div>
        <?php
        get_template_part('partials/page-headline');
        ?>
	</div>

<?php } ?>
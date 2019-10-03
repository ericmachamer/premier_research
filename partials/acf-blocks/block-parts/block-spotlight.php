<?php
$num_rows = count(get_field('spotlight'));
while (have_rows('spotlight')) {
    the_row(); ?>
    <?php
    $image = get_sub_field('image');
    $size = 'cards';
    $img = wp_get_attachment_image_src($image, $size);
    ?>
    <div class="col-6 spotlight spotlight-<?= $num_rows; ?> col-md-3 transparent <?php if($num_rows < 5) { echo 'no-max-width '; } ?> animate delay">
        <div class="spotlight-body text-center">
            <div class="row align-content-start">
                <div class="col-12">
                    <h3 class="spotlight-title text-center"><?php the_sub_field('title'); ?></h3>
                </div>
                <div class="col-12">
                    <div class="spotlight-image text-center">
                        <img src="<?= $img[0]; ?>" alt="<?= strip_tags(get_sub_field('title')); ?>">
                    </div>
                    <?php
                    if(get_sub_field('under_image') != '') {
                    ?>
                        <div class="spotlight-image-under-text text-center">
                            <?php the_sub_field('under_image'); ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php
                    if(get_sub_field('block_button') === true) {
                        ?>
                        <div class="extra-padding">
                            <?php get_template_part('partials/acf-blocks/block-parts/block-cta-single'); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
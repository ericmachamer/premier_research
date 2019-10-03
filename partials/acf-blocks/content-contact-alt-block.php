<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="one-column-bg contact-block <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 left-block text-center">
                <div class="contact-block-image text-center animate animate-bounce">
                <?php
                if(get_field('image_type') === 'image') {
                    $image = get_field('image');
                    $size = 'featured-thumb-large-no-crop';
                    $img = wp_get_attachment_image_src($image, $size);
                    ?>
                    <img src="<?= $img[0]; ?>" alt="<?= get_field('heading'); ?>" />
                    <?php
                } else {
                    the_field('animation_shortcode');
                }
                ?>
                </div>
                <div class="heading animate">
                    <h2><?= get_field('heading'); ?></h2>
                    <?php if(get_field('sub_heading') != '') { ?>
                        <div class="intro-content">
                            <p><?= get_field('sub_heading'); ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="content-block animate">
                    <?= get_field('content'); ?>
                </div>
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
            <div class="col-2 d-none d-lg-block">
                <div class="vert-holder"></div>
            </div>
            <div class="col-12 col-lg-5 right-block text-center">
                <div class="heading animate">
                    <h2><?= get_field('heading_right'); ?></h2>
                    <?php if(get_field('sub_heading_right') != '') { ?>
                        <div class="intro-content">
                            <p><?= get_field('sub_heading_right'); ?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="content-block animate">
                    <?= get_field('content_right'); ?>
                </div>
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas_right'); ?>
                <div class="contact-block-image text-center animate animate-bounce">
                    <?php
                    if(get_field('image_type_right') === 'image') {
                        $image = get_field('image_right');
                        $size = 'featured-thumb-large-no-crop';
                        $img = wp_get_attachment_image_src($image, $size);
                        ?>
                        <img src="<?= $img[0]; ?>" alt="<?= get_field('heading_right'); ?>" />
                        <?php
                    } else {
                        the_field('animation_shortcode_right');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="column-bg one-column-bg <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax paralax-no-mobile'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row<?php if(get_field('text_alignment') === 'text-right') { ?> justify-content-end<?php } ?>">
            <?php if(in_array('video', get_field('advanced_sections'))) { ?>
                <div class="order-first <?php if(get_field('text_alignment') != 'full-text') { ?>col-lg-6<?php } else { ?>col-12 full-video-btn<?php } ?> <?php if(get_field('text_alignment') === 'full-text' || get_field('text_alignment') === 'text-right') { ?>order-lg-first<?php } else { ?>order-lg-last<?php } ?> video-btn-holder text-center animate">
                    <?php if(get_field('vide_source') == 'local') { ?>
                    <video width="100%" height="400" controls class="toggle-video video-js <?php if(get_field('type') === 'inplace') { echo 'show-video'; } ?>" data-setup='{}'>
                        <source src="<?= wp_get_attachment_url(get_field('video')); ?>" type="video/mp4">
                    </video>
                    <?php
                        } else {
                    ?>
                        <video class="video-js" data-setup='{ "techOrder": ["vimeo"], "sources": [{ "type": "video/vimeo", "src": "<?= get_field('video_url'); ?>"}], "vimeo": { } }'></video>
                    <?php
                        }
                    ?>
                </div>
            <?php } ?>
            <?php
            $advanced_sections = get_field('advanced_sections');

            ?>
            <div class="col-12 <?php if(get_field('text_alignment') != 'full-text') { ?>col-lg-6 text-lg-left <?php } ?> <?php if(in_array('cta', $advanced_sections)) { echo 'text-center'; } ?>">
                <div class="heading animate">
                    <h2><?= get_field('heading'); ?></h2>
                    <?php if(get_field('sub_heading') != '') { ?>
                        <div class="intro-content">
                            <p><?= get_field('sub_heading'); ?></p>
                        </div>
                    <?php } ?>
                </div>
                <?php get_template_part('partials/acf-blocks/block-parts/block-text'); ?>
                <?php get_template_part('partials/acf-blocks/block-parts/block-accordion'); ?>
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
        </div>
    </div>
</div>
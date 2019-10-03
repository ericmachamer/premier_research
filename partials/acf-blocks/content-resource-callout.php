<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="column-bg one-column-bg resource-callout <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax paralax-no-mobile'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
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
            <div class="col-12 <?php if(get_field('text_alignment') != 'full-text') { ?>col-lg-6 text-lg-left <?php } ?> <?php if(have_rows('calls_to_action')) { echo 'text-center'; } ?>">
                <div class="heading animate">
                    <h2><?= get_field('heading'); ?></h2>
                    <?php if(get_field('sub_heading') != '') { ?>
                        <div class="intro-content">
                            <p><?= get_field('sub_heading'); ?></p>
                        </div>
                    <?php } ?>
                </div>
                <?php
                $col = [];
                $col['content_block'] = true;
                $col['content_block_content'] = get_field('content_block_content');
                ?>
                <?php include( locate_template( 'partials/acf-blocks/block-parts/block-text.php', false, false )); ?>
                <div class="row text-left">
                <?php
                    if(have_rows('resources')) {
                        while(have_rows('resources')) {
                            the_row();
                            $image = get_sub_field('custom_thumbnail');
                            $size = 'cards';
                            $img = wp_get_attachment_image_src($image, $size);
                            ?>
                            <div class="col-12 col-md-6 col-lg-3 insight-holder" data-herf="<?= get_the_permalink(get_sub_field('resource_select')); ?>">
                                <div class="card-image text-center animate">
                                    <a href="<?= get_the_permalink(get_sub_field('resource_select')); ?>">
                                        <img src="<?= $img[0]; ?>" alt="<?php the_sub_field('card_title'); ?>">
                                    </a>
                                </div>
                                <div class="title-holder animate">
                                    <a href="<?= get_the_permalink(get_sub_field('resource_select')); ?>"><?= get_the_title(get_sub_field('resource_select')); ?></a>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
                </div>
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
        </div>
    </div>
</div>

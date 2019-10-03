<div class="content-block-holder ta-experience-content">
    <?php if(get_field('background')['color'] != '') {
        ?>
        <div class="background-overlay solid-background-<?= get_field('background')['color'] ?>"
             style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if(get_field('enable_sidebar')) { ?>col-lg-5 <?php } ?>
            content-columns">
                <div class="row animate-content">
                    <?php
                    if( have_rows('content') ) {
                        $sidebar_images = [];
                        $sidebar_content = [];
                        $sidebar_header = [];
                        while (have_rows('content')) {
                            the_row();
                            if( get_row_layout() == 'content_block' ) {
                                ?>
                                <div class="col-12 content-block animate">
                                    <?= get_sub_field('content_block_content_1'); ?>
                                </div>
                                <?php
                            } else if( get_row_layout() == 'image_block' ) {
                                $image = get_sub_field('image');
                                $size = 'featured-thumb-large-no-crop';
                                $image_url = wp_get_attachment_image_src($image, $size);
                                array_push($sidebar_images, $image);
                                array_push($sidebar_content, get_sub_field('under_image_text'));
                                array_push($sidebar_header, get_sub_field('image_title'));
                                ?>
                                <div class="col-12 image-block <?php if(get_field('enable_sidebar')) { ?>d-lg-none<?php } ?> animate">
                                    <img src="<?= $image_url[0]; ?>" alt="<?= get_sub_field('heading'); ?>" />
                                    <div class="below-image">
                                        <?= get_sub_field('under_image_text'); ?>
                                    </div>
                                </div>
                                <?php
                            } else if(get_row_layout() == 'image_bullets') {
                                ?>
                                <div class="col-12 image-bullets">
                                    <div class="row">
                                        <?php
                                        if( have_rows('image_bullets') ) {
                                            while ( have_rows('image_bullets') ) {
                                                the_row();
                                                ?>
                                                <div class="col-12 col-xxl-6 image-bullet-content animate">
                                                    <div class="bullet">
                                                        <?php
                                                        $image = get_sub_field('image');
                                                        $size = 'featured-thumb-square';
                                                        $image_url = wp_get_attachment_image_src($image, $size);
                                                        ?>
                                                        <img src="<?= $image_url[0]; ?>" alt="<?= strip_tags(get_sub_field('content')); ?>" />
                                                    </div>
                                                    <div class="text">
                                                        <?= get_sub_field('content'); ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            } else if( get_row_layout() == 'buttons' ) {
                                $count = count(get_field('calls_to_action'));
                                while ( have_rows('calls_to_action') ) {
                                    the_row();
                                    $target = '_self';
                                    $link_type = get_sub_field('link_type');
                                    $btn_type = get_sub_field('type');
                                    $btn_outline_color = get_sub_field('outline_color');
                                    /*
                                     * Set $url for link
                                     * Set $target for link
                                     */
                                    if ($link_type === 'anchor') {
                                        $url = get_sub_field('anchor_link');
                                    } else if ($link_type === 'external') {
                                        $url = get_sub_field('external_link');
                                        $target = '_blank';
                                    } else {
                                        $url = get_sub_field('internal_link');
                                    }
                                    /*
                                     * Set button class
                                     */
                                    if ($btn_type === 'text') {
                                        $btn_class = 'btn-link';
                                    } else {
                                        $btn_class = 'btn-outline';
                                    }
                                    if ($btn_outline_color === 'dark') {
                                        $btn_class .= ' btn-outline-primary-lighter';
                                    } else {
                                        $btn_class .= ' btn-outline-white';
                                    }

                                    ?>
                                    <a class="col-10 col-lg-12 col-xl-6 button-holder animate" href="<?= $url; ?>"
                                       target="<?= $target; ?>"><span class="full-btn btn btn-raised <?= $btn_class; ?>"><?= get_sub_field('label'); ?></span></a>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                </div>
            </div>
            <?php if(get_field('enable_sidebar')) { ?>
                <div class="col-7 d-none d-lg-block sidebar animate">
                    <div class="row">
                        <?php
                        $runs = 0;
                        foreach ($sidebar_images as $si) {
                            $image = $si;
                            $size = 'bg-block';
                            $image_url = wp_get_attachment_image_src($image, $size);
                            ?>
                            <div class="col-12 image-block image-block-sidebar <?php if
                            ($sidebar_header[$runs] == '') { echo 'no-header'; } ?>">
                                <?php
                                if($sidebar_header[$runs] != '') {
                                    ?>
                                    <h3 class="animate"><?= $sidebar_header[$runs]; ?></h3>
                                    <?php
                                }
                                ?>
                                <img src="<?= $image_url[0]; ?>" alt="" class="animate" />
                                <div class="below-image animate">
                                    <?= $sidebar_content[$runs]; ?>
                                </div>
                            </div>
                            <?php
                            $runs++;
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
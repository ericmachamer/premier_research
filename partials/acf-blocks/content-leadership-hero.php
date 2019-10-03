<?php
$text_align = get_field('content_position');
$background = '';
$background_type = get_field('background_type');
$background_shade = 'light';
if($background_type === 'solid') {
    $background_color = get_field('background_color');
    switch($background_color) {
        case 'white':
            $color = '#fff';
            break;
        case 'light':
            $color = '#F8F8F8';
            break;
        case 'dark':
            $color = '#505050';
            $background_shade = 'dark';
            break;
        default:
            $color = '#fff';
    }
    $background .= 'background-color: ' . $color . ';';
}
$background_image = get_field('hero_image');
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image, $size);
if(isset($foreground_image[0])) {
    $background_image_1 = 'url(' . $foreground_image[0] . ")";
} else {
    $background_image_1 = 'url()';
}
if(isset($background_image[0]) && $background_type === 'image') {
    $background_image_2 = 'url(' . $background_image[0] . ")";
}else {
    $background_image_2 = 'url()';
}
$background .= ' background-image: ' . $background_image_1 . ', ' . $background_image_2 . ';';
$header_text_color = get_field('main_header_color');
?>
<div class="header-hero header-leadership-hero header-gap<?php if(isset($foreground_image[0])) { echo ' has-foreground'; } ?> <?= $background_shade; ?><?php if($text_align === 'right') { echo ' content-right'; } ?>" style="<?= $background; ?>">
    <div class="container">
        <div class="row text-lg-left<?php if($text_align === 'right') { echo ' justify-content-end'; } ?>">
            <div class="col-12 <?php if(get_field('text_alignment') == 'right') { echo 'text-right'; } ?>">
                <h1 class="<?= $header_text_color; ?>"><?= get_field('hero_title'); ?></h1>
                <?php
                if( have_rows('hero_subheadline') ) {
                    while ( have_rows('hero_subheadline') ) {
                        the_row();
                ?>
                        <div class="sub-head <?= $header_text_color; ?>"><p><?= get_sub_field('title_line'); ?></p></div>
                <?php
                    }
                }
                ?>

                <?php
                    if( have_rows('hero_calls_to_action') ) {
                ?>
                    <div class="hero-cta-holder">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-6 col-xl-11">
                    <?php
                        while ( have_rows('hero_calls_to_action') ) {
                            the_row()
                    ?>
                        <?php
                            $target = '_self';
                            $link_type = get_sub_field('link_type');
                            $btn_type = get_sub_field('type');
                            /*
                             * Set $url for link
                             * Set $target for link
                             */
                            if($link_type === 'anchor') {
                                $url = get_sub_field('anchor_link');
                            } else if($link_type === 'external') {
                                $url = get_sub_field('external_link');
                                $target = '_blank';
                            } else {
                                $url = get_sub_field('internal_link');
                            }
                            /*
                             * Set button class
                             */
                            if($btn_type === 'text') {
                                $btn_class = 'btn-link';
                            } else {
                                $btn_class = 'btn-outline btn-outline-primary-lighter';
                            }
                        ?>
                            <a class="btn btn-raised <?= $btn_class; ?>" href="<?= $url; ?>" target="<?= $target; ?>"><?= get_sub_field('label'); ?></a>
                    <?php
                        //end while have_rows('hero_calls_to_action')
                        }
                    ?>
                            </div>
                        </div>
                    </div>
                <?php
                    //end if have_rows('hero_calls_to_action')
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
global $post;
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
$foreground_image = get_field('foreground_image');
$background_image = get_field('hero_image');
$size = 'bg-block';
$foreground_image = wp_get_attachment_image_src($foreground_image, $size);
$background_image = wp_get_attachment_image_src($background_image, $size);
if(isset($background_image[0]) && $background_type === 'image') {
    $background_image = 'url(' . $background_image[0] . ")";
}else {
    $background_image = 'url()';
}
$background .= ' background-image: ' . $background_image . ';';
$bw = '';
if(get_field('image_black_and_white')) {
    $bw = 'grayscale';
}
?>
<div class="header-hero header-gap <?= $background_shade; ?> <?= get_field('hero_text_color'); ?><?php if($text_align === 'right') { echo ' content-right'; } ?> <?= $bw; ?> <?= $post->post_name; ?>" style="<?= $background; ?>">
    <div class="container">
        <div class="row text-center text-lg-left<?php if($text_align === 'right') { echo ' justify-content-end'; } ?>">
            <div class="col-12 col-lg-7">
                <h1 class="animate"><?= get_field('hero_title'); ?></h1>
                <p class="sub-head animate animate-left"><?= get_field('hero_subheadline'); ?></p>
                <div class="hero-content animate animate-left">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-11">
                            <?= get_field('hero_content'); ?>
                        </div>
                    </div>
                </div>
                <?php
                    if( have_rows('hero_calls_to_action') ) {
                ?>
                    <div class="hero-cta-holder">
                        <div class="row no-gutters justify-content-center justify-content-lg-start">
                            <div class="col-auto col-lg-6">
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
                            <a class="btn btn-raised animate animate-right <?= $btn_class; ?>" href="<?= $url; ?>" target="<?= $target; ?>"><?= get_sub_field('label'); ?></a>
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
    <?php
    if(isset($foreground_image[0])) {
        ?>
        <div class="foreground-img">
            <img class="foreground-img-image" src="<?= $foreground_image[0]; ?>" alt="" />
        </div>
        <?php
    }
    ?>
    <?php
        if(get_post_type( get_the_ID() ) != 'leadership') {
    ?>
    <div class="down arrow <?= get_field('drop_arrow_color'); ?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116.78 26.69"><defs><style>.a{fill:#231f20;}</style></defs><title>prcom_Asset 1ARROW</title><path class="a" d="M59,26.69l-.39-.16L.61,1.92A1,1,0,0,1,.08.61,1,1,0,0,1,1.39.08L59,24.52,115.38.08a1,1,0,1,1,.8,1.84Z"/></svg></div>
    <div class="drop-animate"></div>
    <?php
        }
    ?>
</div>

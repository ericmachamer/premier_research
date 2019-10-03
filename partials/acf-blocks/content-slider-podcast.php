<?php
$background_image = get_field('background');
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
?>
<section class="slides podcast-slider column-bg wrapper text-center text-lg-left <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-alt"></div>
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start">
            <div class="col-12 <?php if( have_rows('calls_to_action') ) { ?>col-lg-8<?php } ?>">
                <?php
                $heading = get_field('podcast_slider_header', 'option');
                $desc = get_field('podcast_slider_sub_header', 'option');

                if ($heading) {
                    ?>
                    <div class="heading">
                        <h2><?= $heading; ?></h2>
                        <?php if($desc != '') { ?>
                            <div class="intro-content">
                                <?= $desc; ?>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php include(locate_template('partials/acf-blocks/block-parts/block-slides-podcast.php', false, false));?>
    </div>
</section>
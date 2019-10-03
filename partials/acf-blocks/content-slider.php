<?php
$background_image = get_field('background');
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
?>
<section class="slides column-bg wrapper text-center text-lg-left <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row justify-content-center justify-content-lg-start">
            <div class="col-12 <?php if( have_rows('calls_to_action') ) { ?>col-lg-8<?php } ?>">
                <?php
                $heading = get_field('title');
                $desc = get_field('content');

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
            <?php if( have_rows('calls_to_action') ) { ?>
            <div class="col-8 col-lg-4 full-btn">
                <?php  include(locate_template('partials/acf-blocks/block-parts/block-ctas.php', false, false)); ?>
            </div>
            <?php } ?>
        </div>
        <?php
            if(get_field('experts') != '') {
                include(locate_template('partials/acf-blocks/block-parts/block-slides.php', false, false));
            } else {
                include(locate_template('partials/acf-blocks/block-parts/block-slides-default.php', false, false));
            }
        ?>
    </div>
</section>

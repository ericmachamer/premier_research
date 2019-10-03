<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
?>
<section class="resources-wrapper <?= get_field('background')['color']; ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <?php
                $heading = get_field('header');
                $desc = get_field('content');
                $sh = get_field('sub_header');
                if ($heading) {
                    ?>
                    <header class="section-content">
                        <h2 class="title animate"><?php echo $heading ?></h2>
                        <?php
                        if ($sh) {
                            ?>
                            <h3 class="sh animate"><?php echo $sh ?></h3>
                            <?php
                        }
                        ?>
                        <?php
                        if ($desc) {
                            ?>
                            <div class="desc animate"><?php echo $desc ?></div>
                            <?php
                        }
                        ?>
                    </header>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php get_template_part('partials/acf-blocks/block-parts/block-spotlight'); ?>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-4 full-btn">
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
        </div>
    </div>
</section>
<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="two-column-bg">
    <div class="row background-holder no-gutters">
        <?php
            $column = 'column_1';
            $background_image = get_field('column_1_background');
            $size = 'bg-block';
            $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
        ?>
        <div class="col-12 col-lg-6 column-bg column-1 <?php if(get_field($column.'_background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
            <div class="background-overlay solid-background-<?= get_field($column.'_background')['color']; ?>" style="opacity: <?= get_field($column.'_background')['opacity'] / 100; ?>"></div>
        </div>
        <?php
            $column = 'column_2';
            $background_image = get_field('column_2_background');
            $size = 'bg-block';
            $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
        ?>
        <div class="col-12 col-lg-6 column-bg column-2 <?php if(get_field($column.'_background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
            <div class="background-overlay solid-background-<?= get_field($column.'_background')['color']; ?>" style="opacity: <?= get_field($column.'_background')['opacity'] / 100; ?>"></div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <?php
                $column_number = 1;
                $col = get_field('column_1');
                include(locate_template('partials/acf-blocks/block-parts/block-two-column-background.php', false, false));

                $column_number = 2;
                $col = get_field('column_2');
                include(locate_template('partials/acf-blocks/block-parts/block-two-column-background.php', false, false));
                ?>
            </div>
        </div>
    </div>
</div>

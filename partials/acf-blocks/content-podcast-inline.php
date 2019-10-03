<?php
    $GLOBALS['inline_podcast'] = 'true';
?>
<section class="inline-podcast">
    <div class="podcast-holder row no-gutters">
        <div class="col-3 d-none d-lg-block thumbnail-holder">
            <?php
            if(get_field('thumb_specific_image') == '') {
                $thumbnail = get_the_post_thumbnail_url($featured, 'featured-thumb-large');
            } else {
                $thumbnail = get_the_post_thumbnail_url($featured, 'featured-thumb-large');
            }
            ?>
            <div class="podcast-thumbnail">
                <div class="thumbnail-image" style="background-image: url(<?= $thumbnail; ?>);"></div>
            </div>
        </div>
        <div class="col-12 col-lg-9 content-holder">
            <?php
            $featured = get_field('select_podcast');
            ?>
            <h3 class="sidebar-featured-title"><?= get_field('block_title'); ?></h3>
            <?php
            $title = explode(': ', get_the_title($featured));
            ?>
            <h2 class="sidebar-title"><?= $title[0]; ?></h2>
            <p class="description"><?= $title[1]; ?></p>
            <a href="<?= get_permalink($featured); ?>" class="full-btn btn
            btn-raised btn-alt">Listen Now</a>
        </div>
    </div>
</section>
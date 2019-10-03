<section class="podcast col-12">
    <div class="background-overlay solid-background-alt"></div>
    <div class="podcast-holder dark text-center">
        <?php
            $featured = get_field('default_podcast', 'option');
        ?>
        <h3 class="sidebar-title"><?= get_field('podcast_sidebar_header', 'option'); ?></h3>
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
        <?php
            $title = explode(': ', get_the_title($featured));
        ?>
        <h2 class="sidebar-title"><?= $title[0]; ?></h2>
        <p class="description"><?= $title[1]; ?></p>
        <a href="<?= get_permalink($featured); ?>" class="full-btn btn
        btn-raised btn-outline btn-outline-white">Listen Now</a>
    </div>
</section>
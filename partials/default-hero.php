
<?php
$overlay = 0;
if(has_post_thumbnail() && !is_home() && !is_archive() && get_post_type() != 'leadership') {
    $overlay = 1;
    $background_image = get_post_thumbnail_id();
} else {
    $background_image = get_field('default_hero', 'option');
}
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image, $size);
?>
<div class="header-hero header-gap <?php if($overlay === 1) { echo 'overlay'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="container">
        <div class="row">
            <div class="col-12 <?php if(is_front_page()) { ?>col-lg-7<?php } ?>">
                <?php
                    if(!is_home() && !is_archive() && get_post_type() != 'leadership') {
                        $title = get_the_title();
                    } else if(get_post_type() == 'leadership') {
                        ?>
                        <h1 class="management-title"><?= get_field('management_title', 'option'); ?></h1>
                        <?php
                    } else if(is_archive()) {
                        if (have_posts()) : the_post();
                    ?>
                            <h1 class="page-title">
                                <?php if (is_tag()) : ?>
                                    Tag: <?php single_tag_title(); ?>
                                <?php elseif (is_day()) : ?>
                                    Daily Archives: <?php the_time('F jS, Y'); ?>
                                <?php elseif (is_month()) : ?>
                                    Monthly Archives: <?php the_time('F, Y'); ?>
                                <?php elseif (is_year()) : ?>
                                    Yearly Archives: <?php the_time('Y'); ?>
                                <?php else : ?>
                                    <?php single_cat_title(); ?>
                                <?php endif; ?>
                            </h1>
                    <?php
                        endif;
                        rewind_posts();
                    } else {
                        $title = get_the_title(get_option('page_for_posts', true));
                    }
                ?>
                <h1><?= $title; ?></h1>
            </div>
        </div>
    </div>
</div>

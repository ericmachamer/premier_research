<?php

    $extra = [];
    if(isset($_POST['page'])) {
        $page = $_POST['page'] + 1;
    }
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12,
        'orderby' => 'date',
        'post_status' => 'publish',
        'order'   => 'DESC',
        'paged'   => $page
    );
    if($_POST['filters'] != '') {
        $filters = explode(',', $_POST['filters']);
        if($filters[0] != '' && $filters[0] != 'all') {
            $expertise = array(
                'taxonomy' => 'expertise',
                'field' => 'term_id',
                'terms' => array($filters[0]),
            );
        }
        if($filters[1] != '' && $filters[1] != 'all') {
            $functional_area = array(
                'taxonomy' => 'functional-area',
                'field' => 'term_id',
                'terms' => array($filters[1]),
            );
        }
        if($filters[2] != '' && $filters[2] != 'all') {
            $resource_type = array(
                'taxonomy' => 'content-type',
                'field' => 'term_id',
                'terms' => array($filters[2]),
            );
        }
        $cat_filter = array(
            'tax_query' => array(
                'relation' => 'AND',
                $expertise,
                $functional_area,
                $resource_type
            )
        );
        $extra = array_merge($extra,$cat_filter);
        //thee_debug($cat_filter);
    }
    if($_POST['search'] != '') {
        $term = esc_html($_POST['search']);
        $search = array('s' => $term);
        $extra = array_merge($extra,$search);
    }
    $args = array_merge($args,$extra);
    //thee_debug($args);
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        ?>
        <div class="max-posts" data-max-posts="<?= $query->max_num_pages; ?>"></div>
        <?php
        while($query->have_posts()) {
            $query->the_post();
            $content_type = wp_get_post_terms(get_the_ID(), 'content-type');
            $content_types = '';
            //thee_debug($content_type);
            if(is_array($content_type)) {
                foreach ($content_type as $ct) {
                    $content_types .= ' '.$ct->slug;
                }
            }
            $content_type = explode(' ', $content_types);
            $background_image = get_post_thumbnail_id();
            if(get_field('thumb_specific_image')) {
                $background_image = get_field('thumb_specific_image')['ID'];
            }
            $size = 'cards';
            $background_image = wp_get_attachment_image_src($background_image, $size);
            $background = $background_image[0];
            $background_class = '';
            if($background == '') {
                $background = get_stylesheet_directory_uri().'/dist/images/pr_resources_missingthumb.jpg';
                $background_class = ' placeholder';
            }
            if(in_array('white-paper', $content_type)) {
                $cta_text = 'Download';
            } else if(in_array('video', $content_type) || in_array('webinar', $content_type)) {
                $cta_text = 'Watch';
                $background_class .= ' has-play';
            } else if(in_array('podcast', $content_type)) {
                $cta_text = 'Listen';
                $background_class .= ' has-play';
            } else {
                $cta_text = 'Read';
            }
            $filter = false;
            if(get_field('thumbnail_black_and_white') === NULL || get_field('thumbnail_black_and_white')) {
                $filter = true;
            }
            ?>
            <div class="col-12 col-md-4 col-lg-3 col-xxl-2 search-card<?= $content_types; ?>" data-href="<?= get_post_permalink(); ?>">
                <div class="card-wrapper row no-gutters justify-content-between">
                    <div class="card-content-holder">
                        <div class="card-image text-center<?= $background_class; ?> <?php if(!$filter) { echo 'no-filter'; } ?>" style="background-image: url(<?= $background; ?>);"></div>
                        <?php
                            $excerpt = wp_trim_words( strip_tags(strip_shortcodes(get_the_content())), 8, '...' );
                            if($excerpt == '') {
                                $excerpt = get_the_title();
                            }
                        ?>
                        <div class="card-text"><?= get_the_title(); ?></div>
                    </div>
                    <div class="card-content-holder place-border">
                        <a href="<?= get_post_permalink(); ?>" class="btn btn-text btn-sm"><?= $cta_text; ?> Now</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p class="text-center" style="width: 100%; padding: 0 30px;">Nothing found. Please enter a custom keyword search for better results.</p>';
    }
?>

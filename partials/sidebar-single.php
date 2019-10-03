<div class="col-12 col-md-3 offset-md-1 recent-posts sidebar-single">
    <h2 class="sidebar-title">Recent Posts</h2>
    <?php
    $terms_check = wp_get_post_terms(get_the_ID(), 'content-type', array("fields" => "slugs"));
    $limit = 3;
    if(get_field('default_podcast', 'option') && !isset($GLOBALS['inline_podcast']) && !in_array('podcast', $terms_check)) {
        $limit = 2;
    }
    $args = array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'content-type',
                'field' => 'slug',
                'terms' => 'blog',
            ),
        ),
        'posts_per_page' => $limit,
        'post__not_in' => [get_the_ID()]
    );
    $news = new WP_Query($args);
    if ($news->have_posts()) {
    $runs = 0;
    ?>
    <section class="full-width-post">
        <div class="row">
            <?php while ($news->have_posts()) {
                $runs++;
                $news->the_post();
                array_push($featured_id, get_the_ID());
                $no_image = false;
                $image = get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb-large');
                ?>
                <div class="col-12 full-post single-post">
                    <div class="row no-gutters">
                        <?php
                            if($image != '') {
                                ?>
                                <div class="hero-image <?php if ($no_image == true) { ?>no-image<?php } ?> <?php if(!get_field('thumbnail_black_and_white')) { echo 'no-filter'; } ?>"
                                     data-href="<?= get_the_permalink(); ?>">
                                    <div class="image full" style="background-image: url(<?= $image; ?>);"></div>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="post-titles-holder col-12 align-self-start">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'functional-area');
                            if (isset($terms[0])) {
                                ?>
                                <h3>
                                    <a href="<?= get_term_link($terms[0]->term_id); ?>"><?= $terms[0]->name; ?></a>
                                </h3>
                                <?php
                            }
                            ?>
                            <h2><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="by-date align-self-end">
                                <p class="by-line">By <?php the_author_posts_link(); ?></p>
                                <p class="post-date"><?= get_the_date('F j, Y'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section class="view-all col-12">
        <a href="/learnings-insights/premier-perspectives" class="full-btn btn
        btn-raised btn-outline btn-outline-primary-lighter">Show All</a>
    </section>
    <?php
            }
    ?>
    <?php
    if(!isset($GLOBALS['inline_podcast']) && !in_array('podcast', $terms_check)) {
        get_template_part('partials/sidebar-podcast');
    }
    ?>
</div>
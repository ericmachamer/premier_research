<?php
$main_id = get_the_ID();
?>
<article class="blog">
    <div class="container">
        <div class="row">
            <div class="col-12 main-blog-title text-center">
                <h1><?= get_field('main_blog_title', 'option'); ?></h1>
                <?= get_field('main_blog_blurb', 'option'); ?>
            </div>
        </div>
        <?php
        if (get_query_var('paged') <= 1 && !$_GET['filters']) {
            ?>
        <div class="row">
            <?php
                $offset = 0;
                $featured_id = [];
                $args = array(
                    'post_type' => 'post',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'content-type',
                            'field' => 'slug',
                            'terms' => 'blog',
                        ),
                    ),
                    'posts_per_page' => 1,
                    'offset' => $offset, //works with paged
                );
                if(is_author()) {
                    $args['author'] = get_the_author_meta('ID');
                }
                $news = new WP_Query($args);
                if ($news->have_posts()) {
                    $news_query = $news;
                    $runs = 0;
                    ?>
            <section class="full-width-post col-12">
                <div class="row">
                    <?php while ($news->have_posts()) {
                                $runs++;
                                $news->the_post();
                                array_push($featured_id, get_the_ID());
                                $no_image = false;
                                if ($runs == 4 || $runs == 6) {
                                    if (get_field('thumb_specific_image') == '') {
                                        $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
                                    } else {
                                        $image = get_field('thumb_specific_image')['sizes']['bg-block'];
                                    }
                                } else {
                                    if (get_field('thumb_specific_image') == '') {
                                        $image = get_the_post_thumbnail_url(get_the_ID(), 'img-overlay');
                                    } else {
                                        $image = get_field('thumb_specific_image')['sizes']['img-overlay'];
                                    }
                                }
                                if ($image == '') {
                                    $image = get_field('default_no_image', 'option');
                                    $image = $image['sizes']['bg-block'];
                                    $no_image = true;
                                }
                                ?>
                    <div class="col-12 full-post single-post animate">
                        <div class="row no-gutters">
                            <div class="hero-image" data-href="<?= get_the_permalink(); ?>">
                                <div class="image full" style="background-image: url(<?= $image; ?>); background-position: center <?= get_field('thumbnail_select_alignment'); ?>"></div>
                            </div>
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
                                <div class="by-date col-12 align-self-end">
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
            <?php
                }
                ?>
        </div>
            <?php
            $offset = 1;
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'content-type',
                        'field' => 'slug',
                        'terms' => 'blog',
                    ),
                ),
                'posts_per_page' => 2,
                'offset' => $offset
            );
            if(is_author()) {
                $args['author'] = get_the_author_meta('ID');
            }
            $news = new WP_Query($args);
            if ($news->have_posts()) {
                $news_query = $news;
                $runs = 0;
                ?>
        <div class="row">
            <section class="featured-posts col-12">
                <div class="filters">

                </div>
                <h2 class="recent-post-title"><?= get_field('featured_posts_title', 'option'); ?></h2>
                <?php if (get_field('featured_posts_blurb', 'option') != '') { ?>
                <div class="recent-posts-blurb">
                    <?= get_field('featured_posts_blurb', 'option'); ?>
                </div>
                <?php } ?>
                <div class="row">
                    <?php while ($news->have_posts()) {
                                $runs++;
                                $news->the_post();
                                array_push($featured_id, get_the_ID());
                                $no_image = false;
                                if ($runs == 4 || $runs == 6) {
                                    if (get_field('thumb_specific_image') == '') {
                                        $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
                                    } else {
                                        $image = get_field('thumb_specific_image')['sizes']['bg-block'];
                                    }
                                } else {
                                    if (get_field('thumb_specific_image') == '') {
                                        $image = get_the_post_thumbnail_url(get_the_ID(), 'img-overlay');
                                    } else {
                                        $image = get_field('thumb_specific_image')['sizes']['img-overlay'];
                                    }
                                }
                                if ($image == '') {
                                    $image = get_field('default_no_image', 'option');
                                    $image = $image['sizes']['bg-block'];
                                    $no_image = true;
                                }
                                ?>
                    <div class="<?php if ($runs == 1) { ?>col-12 col-md-6 col-lg-8 three-quarter-post<?php } else { ?>col-12 col-md-6 col-lg-4 normal-post<?php } ?> animate single-post">
                        <div class="row no-gutters">
                            <div class="hero-image" data-href="<?= get_the_permalink(); ?>">
                                <div class="image" style="background-image: url(<?= $image; ?>); background-position: center <?= get_field('thumbnail_select_alignment'); ?>"></div>
                            </div>
                        </div>
                        <div class="row no-gutters">
                            <div class="post-titles-holder col-12 align-self-start">
                                <h3>
                                    <?php
                                                $terms = get_the_terms(get_the_ID(), 'functional-area');
                                                if (isset($terms[0])) {
                                                    ?>
                                    <a href="<?= get_term_link($terms[0]->term_id); ?>"><?= $terms[0]->name; ?></a>
                                    <?php
                                                } else {
                                                    echo '&nbsp;';
                                                }
                                                ?>
                                </h3>
                                <h2><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </div>
                            <div class="by-date col-12 align-self-end">
                                <p class="by-line">By <?php the_author_posts_link(); ?></p>
                                <p class="post-date"><?= get_the_date('F j, Y'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                            ?>
                </div>
            </section>

        </div>
                <?php
            }
            ?>
        <!-- Podcast Block -->
        <?php
            if(!is_author()) {
        ?>
            <?php get_template_part('partials/acf-blocks/content-slider-podcast'); ?>
        <?php
            }
        ?>
        <?php
        } //ends if(get_query_var('paged') <= 1)
        ?>
        <!-- All Recent Posts -->
        <div id="recent-posts" class="row recent-posts-background">
            <?php
            $extra = [];
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => get_query_var('paged'),
                'post__not_in' => $featured_id
            );
            if(isset($_GET['expertise']) && is_numeric($_GET['expertise'])) {
                $expertise = array(
                    'taxonomy' => 'expertise',
                    'field' => 'term_id',
                    'terms' => array(esc_html($_GET['expertise'])),
                );
            }
            if(isset($_GET['functional']) && is_numeric($_GET['functional'])) {
                $functional_area = array(
                    'taxonomy' => 'functional-area',
                    'field' => 'term_id',
                    'terms' => array(esc_html($_GET['functional'])),
                );
            }
            $cat_filter = array(
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'content-type',
                        'field' => 'slug',
                        'terms' => 'blog',
                    ),
                    $expertise,
                    $functional_area
                )
            );
            $extra = array_merge($extra,$cat_filter);
            if(is_author()) {
                $args['author'] = get_the_author_meta('ID');
            }
            $args = array_merge($args,$extra);
            $news = new WP_Query($args);
            if ($news->have_posts()) {
                $news_query = $news;
                $runs = 0;
                ?>
            <section class="recent-posts col-12">
                <h2 class="recent-post-title"><?= get_field('recent_posts_title', 'option'); ?></h2>
                <?php if (get_field('recent_posts_blurb', 'option') != '') { ?>
                <div class="recent-posts-blurb">
                    <?= get_field('recent_posts_blurb', 'option'); ?>
                </div>
                <?php } ?>
                <div class="row search-filters">
                    <div class="filter-wrap col-12 col-md-6">
                        <label for="expertise">By expertise area</label>
                        <select name="expertise">
                            <option class="hidden" value=""></option>
                            <option value="all">All expertise areas</option>
                            <?php
                            $categories = get_terms('expertise', array(
                                'hide_empty' => 0,
                            ));
                            foreach ($categories as $c) {
                                $selected = '';
                                if((isset($_GET['expertise']) && is_numeric($_GET['expertise'])) && $_GET['expertise'] == $c->term_id) {
                                    $selected = ' selected';
                                }
                                echo '<option value="' . $c->term_id . '"'.$selected.'>' . $c->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="filter-wrap col-12 col-md-6">
                        <label for="functional">By functional area</label>
                        <select name="functional">
                            <option class="hidden" value=""></option>
                            <option value="all">All functional areas</option>
                            <?php
                            $categories = get_terms('functional-area', array(
                                'hide_empty' => 1,
                            ));
                            foreach ($categories as $c) {
                                $selected = '';
                                if((isset($_GET['functional']) && is_numeric($_GET['functional'])) && $_GET['functional'] == $c->term_id) {
                                    $selected = ' selected';
                                }
                                echo '<option value="' . $c->term_id . '"'.$selected.'>' . $c->name . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <?php while ($news->have_posts()) {
                            $runs++;
                            $news->the_post();
                            $no_image = false;
                            if ($runs == 4 || $runs == 6) {
                                if (get_field('thumb_specific_image') == '') {
                                    $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
                                } else {
                                    $image = get_field('thumb_specific_image')['sizes']['bg-block'];
                                }
                            } else {
                                if (get_field('thumb_specific_image') == '') {
                                    $image = get_the_post_thumbnail_url(get_the_ID(), 'img-overlay');
                                } else {
                                    $image = get_field('thumb_specific_image')['sizes']['img-overlay'];
                                }
                            }
                            if ($image == '') {
                                $image = get_field('default_no_image', 'option');
                                $image = $image['sizes']['bg-block'];
                                $no_image = true;
                            }
                            ?>
                    <div class="<?php if ($runs == 4) { ?>col-12 full-post<?php } else if ($runs == 6) { ?>col-12 col-md-6 col-lg-8 three-quarter-post<?php } else { ?>col-12 col-md-6 col-lg-4 normal-post<?php } ?> single-post animate">
                        <?php if ($runs == 4) { ?>
                        <div class="row no-gutters"><?php } ?>
                            <?php if ($runs != 4) { ?>
                            <div class="row no-gutters"><?php } ?>
                                <div class="hero-image" data-href="<?= get_the_permalink(); ?>">
                                    <div class="image" style="background-image: url(<?= $image; ?>); background-position: center <?= get_field('thumbnail_select_alignment'); ?>"></div>
                                </div>
                                <?php if ($runs != 4) { ?></div><?php } ?>
                            <?php if ($runs != 4) { ?>
                            <div class="row no-gutters"><?php } ?>
                                <div class="post-titles-holder col-12 align-self-start">
                                    <h3>
                                        <?php
                                                $terms = get_the_terms(get_the_ID(), 'functional-area');
                                                if (isset($terms[0])) {
                                                    ?>
                                        <a href="<?= get_term_link($terms[0]->term_id); ?>"><?= $terms[0]->name; ?></a>
                                        <?php
                                                } else {
                                                    echo '&nbsp;';
                                                }
                                                ?>
                                    </h3>
                                    <h2><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php if ($runs != 4) { ?>
                                </div><?php } ?>
                                <div class="by-date col-12 align-self-end">
                                    <p class="by-line">By <?php the_author_posts_link(); ?></p>
                                    <p class="post-date"><?= get_the_date('F j, Y'); ?></p>
                                </div>
                                <?php if ($runs == 4) { ?></div><?php } ?>
                            <?php if ($runs != 4) { ?></div><?php } ?>
                        <?php if ($runs == 4) { ?></div><?php } ?>
                </div>
                <?php
                    }
                    ?>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    include(locate_template('partials/pagination.php', false, false));
    ?>
</article>
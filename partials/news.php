<?php
$main_id = get_the_ID();
?>
<article class="blog news">
    <div class="container">
        <div class="row">
            <div class="col-12 main-blog-title text-center">
                <h1><?= get_field('main_news_title', 'option'); ?></h1>
                <?= get_field('main_news_blurb', 'option'); ?>
            </div>
        </div>
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
                        'terms' => 'news',
                    ),
                ),
                'posts_per_page' => 1,
                'offset' => $offset, //works with paged
            );
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
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
                            } else {
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'img-overlay');
                            }
                            if ($image == '') {
                                $image = get_field('company_logo', 'option');
                                $image = $image['sizes']['logo'];
                                $no_image = true;
                            }
                            ?>
                            <div class="col-12 full-post single-post dark">
                                <div class="row no-gutters">
                                    <div class="hero-image <?php if ($no_image == true) { ?>no-image<?php } ?>"
                                         data-href="<?= get_the_permalink(); ?>">
                                        <div class="image full" style="background-image: url(<?= $image; ?>);"></div>
                                    </div>
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
                                        <a class="button-holder" href="<?= get_the_permalink(); ?>"><span class="full-btn btn btn-raised btn-outline btn-outline-white">Read More</span></a>
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
        <div id="recent-posts" class="row recent-posts-background">
            <?php
            $args = array(
                'post_type' => 'post',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'content-type',
                        'field' => 'slug',
                        'terms' => 'news',
                    ),
                ),
                'posts_per_page' => 6,
                'paged' => get_query_var('paged'),
                'post__not_in' => $featured_id
            );
            $news = new WP_Query($args);
            if ($news->have_posts()) {
            $news_query = $news;
            $runs = 0;
            ?>
            <section class="recent-posts col-12">
                <div class="row">
                    <?php while ($news->have_posts()) {
                    $runs++;
                    $news->the_post();
                    ?>
                    <div class="col-12 normal-post single-post">
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
                            <p><?= get_the_excerpt(); ?></p>
                        </div>
                    </div>
                    <div class="row no-gutters read-more-holder">
                        <a class="col-auto col-lg-12 col-xl-6" href="<?= get_the_permalink(); ?>"><span class="full-btn btn btn-raised btn-text">Read More</span></a>
                    </div>
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

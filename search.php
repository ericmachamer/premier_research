<?php global $wp_query; ?>
<article class="blog search">
    <div class="container">
        <div class="row">
            <div class="col-12 main-blog-title">
                <h1 class="page-title">
                  <?php echo $wp_query->found_posts; ?> Result<?php if ($count != 1) {
                      echo 's';
                  } ?> for "<?php the_search_query(); ?>"
                </h1>
            </div>
        </div>

        <div class="row">
            <section class="recent-posts col-12">
                <div class="row">
                  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                      <?php thee_get_template_part('partials', 'loop-post'); ?>
                  <?php endwhile; else : ?>
                      <?php thee_get_template_part('partials', 'loop-post-not-found'); ?>
                  <?php endif; ?>
                </div>

                <?php thee_get_template_part('partials', 'pagination-default'); ?>
            </section>
        </div>
    </div>
</article>

<?php get_template_part('partials/default-hero'); ?>
<div class="container">
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
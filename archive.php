<?php get_template_part('partials/default-hero'); ?>
<div class="container">
  <div class="row">
    <section class="col-sm-8">
      <ol class="posts-list">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php thee_get_template_part('partials', 'loop-post'); ?>
          <?php endwhile; else : ?>
              <?php thee_get_template_part('partials', 'loop-post-not-found'); ?>
          <?php endif; ?>
      </ol>

        <?php thee_get_template_part('partials', 'pagination'); ?>
    </section>

      <?php thee_get_sidebar(); ?>
  </div>
</div>
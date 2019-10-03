<?php the_post(); ?>
<div class="container single single-news">
    <section class="row post-title">
        <div class="col-12 title">
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
            <h1><?= get_the_title(); ?></h1>
        </div>
        <div class="by-date col-12 align-self-end">
            <p class="by-line"><?= get_the_date('F j, Y'); ?><?php if(get_field('post_location') != '') { ?><span class="vert-sep">|</span><? echo get_field('post_location'); } ?></p>
        </div>
    </section>
    <?php
    $no_image = false;
    $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
    ?>
    <?php if($image != '') { ?>
    <section class="row">
        <div class="col-12 post-hero">
            <div class="post-hero-bg" style="background-image: url(<?= $image; ?>);"></div>
        </div>
    </section>
    <?php } ?>
    <section class="row">
        <article class="col-12">
            <div class="page-content content-block">
                <?php the_content(); ?>
            </div>
            <div class="sharing-options">
                <div class="social-share">
                    <?php echo do_shortcode('[addtoany]'); ?>
                </div>
                <div class="tags">
                    Tags: <span class="tag-list"><?= get_the_tag_list('', ', ', ''); ?></span>
                </div>
            </div>
        </article>
    </section>
</div>
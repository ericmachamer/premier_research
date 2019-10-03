<?php the_post(); ?>
<div class="container single <?= get_field('text_color'); if(get_field('case_study_file')) { echo ' dark'; } ?>">
    <section class="row post-title <?php if(get_field('download_select') || get_field('case_study_file')) { echo 'is-whitepaper'; } ?>">
        <?php
        if(get_field('download_select') || get_field('case_study_file')) {
            $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
            if($image == '') {
                $image = wp_get_attachment_image_src(get_field('default_hero', 'option'), 'bg-block');
                $image = $image[0];
            }
        ?>
            <div class="background-overlay <?php if(!get_field('black_and_white')) { echo 'no-filter'; } ?>" style="background-image: url(<?= $image; ?>)"></div>
        <?php
        }
        ?>
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
        <?php
            if(!get_field('download_select') && !get_field('case_study_file')) {
        ?>
            <div class="by-date col-12 align-self-end">
                <p class="by-line">By <?php if ( function_exists( 'coauthors_posts_links' ) ) {
                        coauthors_posts_links();
                    } else {
                        the_author_posts_link();
                    } ?><span
                            class="vert-sep">|</span><?= get_the_date('F j, Y'); ?></p>
            </div>
        <?php
            }
        ?>
    </section>
    <?php
    $no_image = false;
    $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
    ?>
    <?php if($image != '' && !get_field('download_select')  && !get_field('case_study_file')) { ?>
    <section class="row">
        <div class="col-12 post-hero">
            <div class="post-hero-bg <?php if(!get_field('black_and_white')) { echo 'no-filter'; } ?>" style="background-image: url(<?= $image; ?>);"></div>
        </div>
    </section>
    <?php } ?>
    <section class="row content <?php if(get_field('download_select') || get_field('case_study_file')) { echo 'has-padding'; } ?>">
        <article class="col-12 <?php if(get_field('download_select') || get_field('case_study_file')) { echo 'col-lg-6'; } else { echo 'col-md-8'; } ?>">
            <div class="page-content content-block">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
            if(get_field('download_select')) {
                get_template_part('partials/sidebar-single-download');
            } else if(get_field('case_study_file')) {
                get_template_part('partials/sidebar-single-download-nogate');
            } else {
            ?>
                <?php get_template_part('partials/sidebar-single'); ?>
            <?php
            }
        ?>
    </section>
</div>
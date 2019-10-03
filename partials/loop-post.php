<div class="col-12 normal-post single-post">
    <div class="row no-gutters">
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
            <h2 <?php if (!isset($terms[0])) { ?>style="padding-top: 44px"<?php } ?>><a href="<?= get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?= get_the_excerpt(); ?></p>
        </div>
    </div>
    <div class="row no-gutters read-more-holder">
        <a class="col-auto col-lg-12 col-xl-6" href="<?= get_the_permalink(); ?>"><span class="full-btn btn btn-raised btn-text">Read More</span></a>
    </div>
</div>
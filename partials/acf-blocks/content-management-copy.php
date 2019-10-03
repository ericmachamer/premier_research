<div class="management-copy-hero">
    <?php  include(locate_template('partials/default-hero.php', false, false)); ?>
</div>
<div class="management-copy">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4 col-xxl-3 sidebar">
                <img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb-square'); ?>" alt="<?= get_the_title(); ?>" />
            </div>
            <div class="col-12 col-lg-8 offset-xxl-1 content">
                <h3 class="pre-title"><?= get_field('leadership_category'); ?></h3>
                <h2 class="title"><?= get_the_title(); ?></h2>
                <?php
                    if( have_rows('leadership_title') ) {
                        $title_line = '';
                        $runs = 0;
                        // loop through the rows of data
                        while (have_rows('leadership_title')) {
                            the_row();
                            // display a sub field value
                            if($runs > 0) {
                                $title_line .= ', ';
                            }
                            $title_line .= get_sub_field('title_line');
                            $runs++;
                        }
                    }
                ?>
                <h3 class="sub-title"><?= $title_line; ?></h3>
                <?= get_field('content'); ?>
            </div>
        </div>
    </div>
</div>
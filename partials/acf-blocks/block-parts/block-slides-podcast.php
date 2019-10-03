<div id="slider-podcast" class="block-slider row no-gutters card-group">
    <?php
    $args = array(
        'post_type'     => 'post',
        'orderby'       => 'date',
        'posts_per_page'=> 10,
        'post_status'   => 'publish',
        'order'         => 'ASC',
        'tax_query'     => array(
            array(
                'taxonomy' => 'content-type',
                'field'    => 'slug',
                'terms'    => 'podcast',
            )
        )
    );
    $experts = new WP_Query( $args );
    while ($experts->have_posts()) :
        $experts->the_post();
        ?>
        <div class="slide card col <?= get_field('text_color_override'); ?> text-center">
            <?php
            if(get_field('thumb_specific_image') == '') {
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb-large');
            } else {
                $thumbnail = wp_get_attachment_image_url(get_field('thumb_specific_image')['ID'], 'featured-thumb-large');
            }
            ?>
            <div class="card-img-holder">
                <img class="card-img-top" src="<?= $thumbnail; ?>" alt="<?= get_the_title(); ?>" />
            </div>
            <div class="card-body">
                <?php
                $title = explode(': ', get_the_title());
                ?>
                <h3><?= $title[0]; ?></h3>
                <div class="text"><?= $title[1]; ?></div>
            </div>
            <div class="card-footer">
                <div class="cta">
                    <a href="<?= get_permalink(); ?>" class="btn btn-raised btn-outline <?= $btn_class; ?>">Listen Now</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
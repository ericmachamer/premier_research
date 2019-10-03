<div class="col-12 col-lg-5 offset-lg-1 sidebar-single sidebar-single-download">
    <div class="sidebar-holder">
        <?php
        $image = get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb-large');
        if(get_field('thumb_specific_image')) {
            $image = get_field('thumb_specific_image')['sizes']['cards'];
        }
        if($image != '') {
            ?>
            <div class="hero-image <?php if ($no_image == true) { ?>no-image<?php } ?>"
                 data-href="<?= get_the_permalink(); ?>">
                <div class="image full" style="background-image: url(<?= $image; ?>);"></div>
            </div>
            <?php
        }
        ?>
        <div class="download">
            <?php
            if(!isset($_COOKIE['_dlm-gf-cookie'])) {
                echo do_shortcode('[dlm_gf_form download_id="' . get_field('download_select') . '"]');
            } else {
                echo do_shortcode('[download id="' . get_field('download_select') . '"]');
            }
            ?>
        </div>
    </div>
    <div class="form-description">
        <?php
        $form = GFAPI::get_form( 6 );
        ?>
        <p><?= $form["description"]; ?></p>
    </div>
</div>

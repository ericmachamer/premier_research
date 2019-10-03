<div class="col-12 col-lg-5 offset-lg-1 sidebar-single sidebar-single-download sidebar-single-download-nogate">
    <div class="sidebar-holder">
        <?php
        $image = get_the_post_thumbnail_url(get_the_ID(), 'featured-thumb-large');
        if(get_field('thumb_specific_image')) {
            $image = get_field('thumb_specific_image')['sizes']['cards'];
        }
        if($image != '') {
            ?>
            <div class="hero-image <?php if ($no_image == true) { ?>no-image<?php } ?> no-filter"
                 data-href="<?= get_the_permalink(); ?>">
                <div class="image full" style="background-image: url(<?= $image; ?>);"></div>
            </div>
            <?php
        }
        ?>
        <div class="download">
            <a href="<?= wp_get_attachment_url(get_field('case_study_file')); ?>" class="btn btn-outline btn-outline-primary-lighter" style="white-space: normal" target="_blank">Download Now</a>
        </div>
    </div>
</div>
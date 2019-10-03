<div class="row about-author-holder">
    <div class="col-3 profile-image">
        <?php
        $no_image = false;
        $image = get_the_post_thumbnail_url(get_the_ID(), 'bg-block');
        if ($image == '') {
            $image = get_field('company_logo', 'option');
            $image = $image['sizes']['logo'];
            $no_image = true;
        }
        ?>
        <div class="profile-image" style="background-image: url(<?= $image; ?>);"></div>
    </div>
    <div class="col-9 details">
        <h2>Author Details</h2>
        <h3><?= get_the_author(); ?></h3>
        <p class="description"><?= get_the_author_meta('description'); ?></p>
    </div>
</div>
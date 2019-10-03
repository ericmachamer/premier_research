<header class="header sticky">
    <div class="row align-items-center no-gutters justify-content-between">
        <div class="col-6 col-md-auto logo-holder">
            <a class="header-logo" href="<?php echo bloginfo('url'); ?>"><?php if (get_field('logo', 'option')) {
                    $image = get_field('company_logo', 'option');
                    $size = 'small';
                    $image_url = wp_get_attachment_image_src($image['ID'], $size);
                ?>
                    <img
                    src="<?= $image_url[0] ?>" class="logo"
                    alt="<?php echo bloginfo('name'); ?>" /><?php } else {
                    get_template_part("partials/phlogo");
                    // echo bloginfo('name');


                } ?></a>
        </div>
        <div id="nav-holder" class="col-6 col-md-8 text-right">
            <div class="search-form-holder">
                <?php get_search_form(); ?>
            </div>
            <?php
                $header = get_field('header', 'option');
            ?>
            <a href="<?= $header['button_link'] ?>" class="btn btn-outline btn-outline-primary-lighter d-none d-md-inline-block"><?= $header['button_text'] ?></a>
            <div class="mobile-nav">
                <div class="hamburger hamburger-1"></div>
                <div class="hamburger hamburger-2"></div>
                <div class="hamburger hamburger-3"></div>
            </div>
            <?php bootstrap_nav(); ?>
        </div>
        <script>
            jQuery('#nav-holder #menu-header').append('<li><a class="nav-phone btn btn-secondary" href="tel:<?php the_field("phone_number", "option"); ?>"><span class="phone"><?php the_field("phone_number", "option"); ?></span></a></li>');
        </script>
    </div>
</header>
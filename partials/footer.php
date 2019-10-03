<div class="modal fade" id="video-modal" tabindex="-1" role="dialog" aria-labelledby="video-modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<footer class="footer sticky">
  <div class="footer-container container">
    <div class="row align-items-center justify-content-md-between">
        <div class="col-12 col-md-3 col-lg-auto order-md-last">
            <div class="row footer-logo text-center text-md-left">
                <div class="col text-center text-md-right">
                    <?php if (get_field('company_logo_footer', 'option')) {
                        $image = get_field('company_logo_footer', 'option');
                        $size = 'small';
                        $image_url = wp_get_attachment_image_src($image['ID'], $size);
                        ?>
                        <a href="/"><img
                        src="<?= $image_url[0] ?>" class="logo"
                        alt="<?php echo bloginfo('name'); ?>" /></a><?php } else {
                        get_template_part("partials/phlogo");
                        // echo bloginfo('name');
                    } ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="row align-items-center">
                <div class="col-12 col-md-8 col-lg-auto copy-nav text-center text-lg-left">
                    <div class="copy d-none d-md-inline-block">
                        &copy; <?= date('Y'); ?> <?= get_bloginfo( 'name' ); ?>
                    </div>
                    <div class="footer-menu">
                        <?php
                        $location = 'footer-1-navigation';
                        $menu_obj = get_menu_by_location($location);
                        wp_nav_menu(array(
                            'theme_location' => 'footer-1-navigation',
                            'container' => '',
                            'menu_class' => 'footer-menu-list'
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-auto order-md-first social text-center text-md-left">
                    <ul>
                        <?php
                            while ( have_rows('social_networks', 'option') ) {
                                the_row();
                        ?>
                                <li><a href="<?= get_sub_field('network_url'); ?>" target="_blank"><?= get_sub_field('network_icon'); ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-12 d-md-none mobile-copy text-center">
                    &copy; <?= date('Y'); ?> <?= get_bloginfo( 'name' ); ?>
                </div>
            </div>
        </div>
    </div>
  </div>

    <?php wp_footer(); ?>
    

</footer>
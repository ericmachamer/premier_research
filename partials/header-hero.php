<div class="above-fold">
    <?php
        $image = get_field('hero_image');
        $size = 'bg-block';
        $bg_image = wp_get_attachment_image_src($image, $size);
    ?>
    <div class="header-hero header-gap" style="background-image: url('<?= $bg_image[0]; ?>');">
        <?php 

        if(have_rows('carousel')){
            get_template_part('partials/carousel');
        }
        
        if(get_field('hero_form') != '') {
        ?>
            <div class="header-form-holder">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="header-form">
                                <?php gravity_form(get_field('hero_form'), true, false, false, '', true, 1); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
    <?php
        get_template_part('partials/page-headline');
    ?>
</div>
<?php
if(get_page_template_slug($post->ID) != 'page-contact.php') {
    $background = get_field('cta_background', 'option');
?>
<div class="footer-call-to-action">
    <div class="row no-gutters background-holder d-none d-md-block">
        <div class="col col-5 bg-image" style="background-image: url(<?= $background['image']['sizes']['bg-block']; ?>);"></div>
        <div class="col col-7" style="background: #fff;"></div>
    </div>
    <div class="row">
        <div class="container">
            <section class="row cta-content-holder">
                <div class="cta-content col col-12 col-md-4" style="background-image: url(<?= $background['image']['sizes']['bg-block']; ?>);">
                    <div class="content-container">
                        <h2><?= get_field('cta_heading', 'option'); ?></h2>
                        <p><?= get_field('cta_description', 'option'); ?></p>
                    </div>
                </div>
                <div class="cta-form col col-12 col-md-8">
                    <div class="content-container">
                        <?php gravity_form( get_field('form', 'option') ?: 1, $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = true, $echo = true );
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php } ?>
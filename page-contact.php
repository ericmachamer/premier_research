<?php /* Template Name: Contact */ ?>
<?php the_post(); ?>
<?php $blocks = parse_blocks( $post->post_content ); ?>
<?php
    if($blocks[0]['blockName'] == 'acf/hero') {
        $hero = render_block($blocks[0]);
        unset($blocks[0]);
    }
    if(isset($hero)) {
        echo $hero;
    }
?>
<div class="container">
    <section class="row">
        <article class="composition col-12 col-lg-8">
            <div class="contact-form-holder">
                <?php
                $form = GFAPI::get_form( 5 );
                ?>
                <h2><?= $form["title"]; ?></h2>
                <p><?= $form["description"]; ?></p>
                <?php gravity_form( 5, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $echo = true );
                ?>
            </div>
        </article>
        <article class="composition col-12 col-lg-4">
            <div class="content-block">
                <?php
                $content_markup = '';
                foreach ( $blocks as $block ) {
                    if($block['blockName'] != '') {
                        $content_markup .= render_block($block);
                    }
                }
                //thee_debug($blocks);
                echo $content_markup;
                ?>
            </div>
        </article>
    </section>
</div>
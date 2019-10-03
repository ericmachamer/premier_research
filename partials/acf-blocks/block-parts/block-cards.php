<?php
    $runs = 1;
    while (have_rows('cards')) {
        the_row(); ?>
        <?php
        $image = get_sub_field('card_image')['ID'];
        $size = 'cards';
        $img = wp_get_attachment_image_src($image, $size);
        ?>
        <div class="col-12 col-lg-<?= 12 / get_field('cards_per_row'); ?> animate animate-desktop card delay <?php if
        (get_sub_field('card_text') == '') { echo 'no-text'; } if(get_sub_field
        ('card_background')['color'] == 'transparent') { echo ' light'; } else { echo ' dark'; }
        ?>">
            <div class="card-wrapper" <?php if(get_sub_field('card_text') == '') { ?>data-href="<?= get_sub_field('card_button_link'); ?>"<?php } ?>>
                <div class="card-content">
                    <div class="background-overlay solid-background-<?= get_sub_field('card_background')
                    ['color']; ?>" style="opacity: <?= get_sub_field('card_background')['opacity'] / 100; ?>"></div>
                    <div class="card-header">
                        <h3 class="card-title animate"><?php the_sub_field('card_title'); ?></h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($img[0])) { ?>
                        <div class="card-image text-center animate">
                            <img src="<?= $img[0]; ?>" alt="<?php the_sub_field('card_title'); ?>">
                        </div>
                        <?php } ?>
                        <div class="card-text animate"><?php the_sub_field('card_text'); ?></div>
                    </div>
                    <div class="card-footer row no-gutters">
                    <?php 
                    $link_type = get_sub_field('link_type');
                    if($link_type === 'external') {
                        $url = get_sub_field('external_card_button_link');
                        $target = "target = '_blank'";
                    } else {
                        $url = get_sub_field('card_button_link');
                    }
                    ?>
                        <a href="<?= $url ?>" <?php if(!empty($target)) echo $target; ?> class="btn btn-raised btn-outline
                        btn-outline-<?php if(get_sub_field('card_background')['color'] == 'transparent') {
                            echo 'primary-lighter'; } else
                            { echo 'white'; } ?> col-auto col-lg-auto animate"><?= get_sub_field('card_button_label'); ?></a>
                    </div>
                </div>
            </div>
        </div>
<?php
        $runs++;
    }
?>
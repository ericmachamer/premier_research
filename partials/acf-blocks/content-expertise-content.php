<?php
$background_image = get_field('background');
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
/*
 *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
 */
?>
<div class="expertise column-bg one-column-bg <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row<?php if(get_field('text_alignment') === 'text-right') { ?> justify-content-end<?php } ?> align-items-center">
            <div class="col-12 mobile-heading heading d-block d-lg-none text-center">
                <?php if(get_field('sub_heading') != '') { ?>
                    <div class="intro-content animate">
                        <p><?= get_field('sub_heading'); ?></p>
                    </div>
                <?php } ?>
                <h2 class=" animate"><?= get_field('heading'); ?></h2>
            </div>
            <div class="col-12 col-lg-7 order-lg-last img-holder">
                <img src="<?= $background_image[0]; ?>" alt="<?= get_field('heading'); ?>" />
            </div>
            <div class="col-12 <?php if(get_field('text_alignment') != 'full-text') { ?>col-lg-5 text-lg-left <?php } ?>text-center">
                <div class="heading d-none d-lg-block">
                    <?php if(get_field('sub_heading') != '') { ?>
                        <div class="intro-content animate">
                            <p><?= get_field('sub_heading'); ?></p>
                        </div>
                    <?php } ?>
                    <h2 class=" animate"><?= get_field('heading'); ?></h2>
                </div>
                <?php get_template_part('partials/acf-blocks/block-parts/block-text'); ?>
                <?php
                if(isset($column) && ($column === 'column_1' || $column === 'column_2') || isset($col['advanced_sections'])) {
                    $advanced_sections = $col['advanced_sections'];
                    $btn = $col['calls_to_action'];
                } else if($col['calls_to_action']) {
                    $advanced_sections = $col['cta'];
                    $btn = $col['calls_to_action'];
                } else {
                    $advanced_sections = get_field('advanced_sections');
                }
                if ((isset($btn) && is_array($btn)) || is_array($advanced_sections) && in_array('cta', $advanced_sections) || have_rows('calls_to_action')) {
                    ?>
                    <div class="hero-cta-holder">
                        <?php
                        if(have_rows('calls_to_action')) {
                            $count = count(get_field('calls_to_action'));
                        } else {
                            $count = count($col['calls_to_action']);
                        }
                        ?>
                        <div class="row justify-content-center <?php if(get_field('text_alignment') != 'full-text') { ?>justify-content-lg-start<?php } ?> <?php if($count === 1 && get_field('text_alignment') != 'full-text') { ?>justify-content-lg-start <?php } ?>full-btn">
                            <?php
                                $count = count(get_field('calls_to_action'));
                                while (have_rows('calls_to_action')) {
                                    the_row()
                                    ?>
                                    <?php
                                    $target = '_self';
                                    $link_type = get_sub_field('link_type');
                                    $btn_type = get_sub_field('type');
                                    $btn_outline_color = get_sub_field('outline_color');
                                    /*
                                     * Set $url for link
                                     * Set $target for link
                                     */
                                    if ($link_type === 'anchor') {
                                        $url = get_sub_field('anchor_link');
                                    } else if ($link_type === 'external') {
                                        $url = get_sub_field('external_link');
                                        $target = '_blank';
                                    } else {
                                        $url = get_sub_field('internal_link');
                                    }
                                    /*
                                     * Set button class
                                     */
                                    if ($btn_type === 'text') {
                                        $btn_class = 'btn-link';
                                    } else {
                                        $btn_class = 'btn-outline';
                                    }
                                    if ($btn_outline_color === 'dark') {
                                        $btn_class .= ' btn-outline-primary-lighter';
                                    } else {
                                        $btn_class .= ' btn-outline-white';
                                    }
                                    ?>
                                    <a class="animate col-auto" href="<?= $url; ?>"
                                       target="<?= $target; ?>"><span class="full-btn btn btn-raised <?= $btn_class; ?>"><?= get_sub_field('label'); ?></span></a>
                                    <?php
                                    //end while have_rows('hero_calls_to_action')
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                    //end if have_rows('hero_calls_to_action')
                }
                ?>
            </div>
        </div>
    </div>
</div>
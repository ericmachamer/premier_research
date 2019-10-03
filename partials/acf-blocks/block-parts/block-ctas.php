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
                    if(have_rows('calls_to_action')) {
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
                            <a class="animate col-12 <?php if(get_field('text_alignment') === 'full-text') { ?><?php if($count === 3) { ?>col-xl-4 col-xxl-3<?php } else { ?>col-lg-6 col-xxl-5<?php } ?><?php } else if(isset($block) && $block['name'] === 'acf/slider') { echo 'col-11'; } else { ?>col-lg-12 col-xl-6<?php } ?>" href="<?= $url; ?>"
                               target="<?= $target; ?>"><span class="full-btn btn btn-raised <?= $btn_class; ?>"><?= get_sub_field('label'); ?></span></a>
                            <?php
                            //end while have_rows('hero_calls_to_action')
                        }
                    } else {
                        foreach ($col['calls_to_action'] as $btn) {
                            $target = '_self';
                            $link_type = $btn['link_type'];
                            $btn_type = $btn['type'];
                            $btn_outline_color = $btn['outline_color'];
                            /*
                             * Set $url for link
                             * Set $target for link
                             */
                            if ($link_type === 'anchor') {
                                $url = $btn['anchor_link'];
                            } else if ($link_type === 'external') {
                                $url = $btn['external_link'];
                                $target = '_blank';
                            } else {
                                $url = $btn['internal_link'];
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
                            <a class="animate col-auto <?php if(get_field('text_alignment') === 'full-text' && !isset($two_col)) { ?>col-xl-5<?php } else if(isset($block) && $block['name'] === 'acf/slider') { echo 'col-12'; } if(isset($two_col)) { ?>col<?php } else { ?>col-lg-12 col-xl-6<?php } ?>" href="<?= $url; ?>"
                               target="<?= $target; ?>"><span class="full-btn btn btn-raised <?= $btn_class; ?>"><?= $btn['label']; ?></span></a>
                            <?php
                            //end while have_rows('hero_calls_to_action')
                        }
                    }
                    ?>
            </div>
        </div>
        <?php
        //end if have_rows('hero_calls_to_action')
}
?>

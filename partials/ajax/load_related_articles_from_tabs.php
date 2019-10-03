<?php
$tab = explode('-', $_POST['tab']);
$page_id = $_POST['page_id'];
if (!is_numeric($tab[1]) || $tab[1] > 3 || !is_numeric($page_id)) {
    echo '<p>Incorrect data. Our team has been informed</p>';
    die();
    /*
     * Kills loading if any alterations happen and isn't returning numeric values
     */
} else {
    $tab = $tab[1];
}
$post = get_post($page_id);
$blocks = parse_blocks($post->post_content);
$tab_data = '';
foreach($blocks as $block) {
    if($block['blockName'] === 'acf/tabs') {
        $tab_data = $block['attrs']['data'];
        break;
    }
}
$tab_runs = 1;
$adjust_tab = $tab - 1;
if($tab_data['tabs_'.$adjust_tab.'_tab_group_show_related_content'] == 1) {
    $related_content_runs = 1;
    $related_content_amount = $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks'];
    if($related_content_amount == 4) {
        $pre_content = '<div class="col-12 col-lg-8"><div class="row equal-height">';
        $post_content = '</div></div>';
    }
    if($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_related_headline'] != '') {
        ?>
        <div class="col-12 pre_related animate">
            <h2><?= $tab_data['tabs_' . $adjust_tab . '_tab_group_related_content_related_headline']; ?></h2>
            <?= wpautop($tab_data['tabs_' . $adjust_tab . '_tab_group_related_content_related_body']); ?>
        </div>
        <?php
    }
    while($related_content_runs <= $related_content_amount) {
        if($related_content_runs == 1 && $related_content_amount == 4) {
            echo $pre_content;
        }
        if($related_content_runs == 3 ) {
            $col = 12;
        } else if($related_content_runs == 4 ) {
            $col = 4;
        } else {
            $col = 6;
        }
        $content_adjust = $related_content_runs - 1; //0 based system
        $card_type = $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_type'];
        ?>
        <div class="col col-12 col-<?php if($related_content_runs != 4) { echo 'md'; } else { echo 'lg'; } ?>-<?= $col; ?> <?= $card_type; ?> animate">
            <div class="related-card <?php if($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_block_background']) { echo 'background-overlay solid-background-'.$tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_block_background']; } ?> <?php if($card_type == 'quote' && $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted'] == '' && $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quote_button_link'] != '') { ?>has-button<?php } ?>">
                <?php
                    if($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_image'] != '' && $card_type == 'image') {
                        $url = $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_image'];
                        $size = 'featured-thumb-square';
                        $image = wp_get_attachment_image_src($url, $size);
                ?>
                        <div class="related-card-image">
                            <img src="<?= $image[0]; ?>" alt="<?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_title']; ?>" />
                        </div>
                <?php
                    }
                ?>
                <?php if($card_type != 'quote') { ?>
                    <?php
                        if($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_sub_title'] != '') {
                    ?>
                            <h3><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_sub_title']; ?></h3>
                    <?php
                        }
                    ?>
                <h2><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_title']; ?></h2>
                <?php } ?>
                <?php if($card_type == 'quote') { ?>
                <div class="content-holder">
                <div class="quote-text">
                <?php } ?>
                <?= wpautop($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_content']); ?>
                <?php if($card_type == 'quote') { ?>
                </div>
                <?php } ?>
                <?php if($card_type != 'quote') { ?>
                <a href="<?= get_the_permalink($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_button_link']); ?>" class="btn btn-raised btn-outline btn-outline-primary-lighter"><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_button_text']; ?></a>
                <?php } ?>
                <?php if($card_type == 'quote' && $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted'] != '') { ?>
                    <div class="quoted-name"><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted']; ?></div>
                    <div class="quoted-title"><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted_title']; ?></div>
                    </div>
                <?php } else if($card_type == 'quote' && $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted'] == '' &&  $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quote_button_link'] != '') { ?>
                <div class="dark btn-holder">
                <a class="btn btn-raised btn-outline btn-outline-white" href="<?= get_the_permalink($tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quote_button_link']); ?>"><?= $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quote_button_text']; ?></a>
                </div>
                    </div>
            <?php
                } else if($card_type == 'quote' && $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quoted'] == '' &&  $tab_data['tabs_'.$adjust_tab.'_tab_group_related_content_blocks_'.$content_adjust.'_quote_button_link'] == '') { ?>
            </div>
            <?php
                }
            ?>
            </div>
        </div>
        <?php
        if($related_content_runs == 3 && $related_content_amount == 4) {
            echo $post_content;
        }
        $related_content_runs++;
    }
}


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
foreach ($blocks as $block) {
    if ($block['blockName'] === 'acf/tabs') {
        $tab_data = $block['attrs']['data'];
        break;
    }
}
$tab_runs = 1;
$adjust_tab = $tab - 1;
//$experts = $tab_data['tabs_'.$adjust_tab.'_tab_group_experts'];
//thee_debug($tab_data);

$background_image = get_field('background');
$size = 'bg-block';
$background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
$background_color = $tab_data['tabs_'.$adjust_tab.'_tab_group_experts_background'];
$btn_class = ' btn-outline-white';
if($tab_data['tabs_'.$adjust_tab.'_tab_group_experts_background'] === 'gray') {
    $btn_class = ' btn-outline-primary-lighter';
}
if($tab_data['tabs_'.$adjust_tab.'_tab_group_experts_type'] != 'highlight') {
    ?>
    <section
            class="slides column-bg wrapper text-center text-lg-left animate <?= $background_color; ?> <?= get_field('text_color_override'); ?><?php if (get_field('background')['use_paralax_scrolling'] === true) {
                echo ' paralax';
            } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
        <div class="overlay"
             style="opacity: <?= $tab_data['tabs_' . $adjust_tab . '_tab_group_background_opacity'] / 100; ?>"></div>
        <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>"
             style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-12">
                    <?php
                    $heading = $tab_data['tabs_' . $adjust_tab . '_tab_group_experts_heading'];
                    $desc = $tab_data['tabs_' . $adjust_tab . '_tab_group_experts_content'];

                    if ($heading) {
                        ?>
                        <div class="heading">
                            <h2><?= $heading; ?></h2>
                            <?php if ($desc != '') { ?>
                                <div class="intro-content">
                                    <?= $desc; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php include(locate_template('partials/ajax/ajax_includes/block-leadership-slides.php', false, false)); ?>
        </div>
    </section>
    <?php
} else {
    //thee_debug($tab_data);
    include(locate_template('partials/ajax/ajax_includes/block-leadership-hightlight.php', false, false));
}
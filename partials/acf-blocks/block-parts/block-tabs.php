<?php
/*
     * Gather repeater data and set to array for nav and array for body. This is to limit DB calls
     */
$tab_nav = [];
$tab_content = [];
if (have_rows('tabs')) {
    $runs = 1;
    while (have_rows('tabs')) {
        the_row();
        while (have_rows('tab_group')) {
            the_row();
            $tab_nav = array_merge($tab_nav, [
                'tab-' . $runs => [
                    'tab_label' => get_sub_field('tab_label'),
                    'text_color_override' => get_sub_field('text_color_override'),
                    'tab_background' => get_sub_field('tab_background'),
                    'show_related_content' => get_sub_field('show_related_content'),
                    'expertise' => implode(',', get_sub_field('expertise')),
                    'functional_area' => implode(',', get_sub_field('functional_area')),
                    'content_type' => implode(',', get_sub_field('content_type'))
                ]
            ]);
            $tab_content = array_merge($tab_content, [
                'tab-' . $runs => [
                    'tab_settings' => [
                        'text_alignment' => get_sub_field('text_alignment'),
                        'heading' => get_sub_field('heading'),
                        'sub_heading' => get_sub_field('sub_heading'),
                        'content_block' => get_sub_field('include_content'),
                        'buttons' => get_sub_field('include_buttons'),
                        'related_content' => get_sub_field('show_related_content'),
                        'experts_color' => get_sub_field('experts_background'),
                        'images' => get_sub_field('include_image'),
                        'video' => get_sub_field('include_video')
                    ],
                    'content_block' => [
                        'content_block_content' => get_sub_field('content_block_content')
                    ],
                    'cta' => [
                        'calls_to_action' => get_sub_field('calls_to_action')
                    ],
                    'image' => [
                        'image_url' => get_sub_field('image')
                    ],
                    'video_block' => [
                        'video-obj' => get_sub_field('video'),
                        'video_background' => get_sub_field('video_thumbnail'),
                        'type' => '',
                        'vide_source' => get_sub_field('vide_source'),
                        'video_url' => get_sub_field('video_url'),
                        'text_line_1' => get_sub_field('text_line_1'),
                        'text_line_2' => get_sub_field('text_line_2'),
                        'description' => get_sub_field('description'),
                        'video_text_color' => get_sub_field('video_text_color')
                    ]
                ]
            ]);
        }
        $runs++;
    }
}
?>
<div class="col-12">
    <?php if (is_page(2790)) echo "<div class='container'>"; ?>
    <ul class="nav-tabs desktop row" id="myTab" role="tablist">
        <?php
        $runs = 1;
        foreach ($tab_nav as $k => $t) {
            ?>
            <li class="nav-item col-12 col-md <?php if ($runs == 1) { ?>active <?php } if($runs > 1) { echo 'hidden ';} ?><?= $t['text_color_override']; ?>">
                <a class="nav-link tab-link <?php if ($runs == 1) { ?>active <?php } ?>solid-background-<?= $t['tab_background'] ?>" id="<?= $k; ?>-tab" data-toggle="tab" href="#<?= $k; ?>" role="tab" data-controls="<?= $k; ?>" data-page-id="<?= get_the_ID(); ?>" <?php if ($t['show_related_content'] == 1) { ?>data-related-content="<?= $t['show_related_content']; ?>" <?php } ?>><?= $t['tab_label']; ?></a>
            </li>
        <?php
            $runs++;
        }
        ?>
    </ul>
    <?php if (is_page(2790)) echo "</div>"; ?>
</div>
<div class="col-12">
    <div class="row experts-loading-holder justify-content-center" style="display: none;">
        <div class="col-12">
            <div class="ajax-loading"></div>
        </div>
    </div>
    <div class="related-experts">
        <div class="container">
            <div id="related-experts" class="row"></div>
        </div>
    </div>
    <?php if (is_page(2790)) echo "<div class='container'>"; ?>
    <div class="tab-content" id="myTabContent">
        <?php
        $runs = 1;
        $col = [];
        foreach ($tab_content as $k => $c) {
            $col = array_merge($col, $c['tab_settings'], $c['content_block'], $c['cta'], $c['video_block'], $c['image']);
            $video_background = $col['video_background'];
            $size = 'bg-block';
            $background_image = wp_get_attachment_image_src($video_background, $size);
            ?>
            <div class="tab-pane fade <?php if ($runs == 1) { ?>show active<?php } ?>" id="<?= $k; ?>" role="tabpanel" aria-labelledby="<?= $k; ?>-tab">
                <div class="row no-gutters<?php if ($col['text_alignment'] === 'text-right') { ?> justify-content-end<?php } ?> content-row">
                    <?php if ($col['images']) { ?>
                        <?php
                                $img = $col['image_url'];
                                $size = 'bg-block';
                                $tab_img = wp_get_attachment_image_src($img, $size);
                                ?>
                        <div class="animate <?php if ($col['text_alignment'] != 'full-text') { ?>col-lg-6<?php } else { ?>col-12<?php } ?> <?php if ($col['text_alignment'] === 'full-text' || $col['text_alignment'] === 'text-right') { ?>order-first<?php } else { ?>order-last<?php } ?> video-btn-holder">
                            <div class="image-holder">
                                <img src="<?= $tab_img[0]; ?>" alt="<?= $col['heading']; ?>" />
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ($col['video']) { ?>
                        <div class="animate <?php if ($col['text_alignment'] != 'full-text') { ?>col-lg-6<?php } else { ?>col-12 full-video-btn<?php } ?> <?php if ($col['text_alignment'] === 'full-text' || $col['text_alignment'] === 'text-right') { ?>order-first<?php } else { ?>order-last<?php } ?> video-btn-holder <?php if ($col['images']) { ?>has-image<? } ?>">
                            <div class="video-thumbnail <?= $col['video_text_color']; ?>" style="background-image: url(<?= $background_image[0]; ?>);">
                                <div class="featured">
                                    Featured Video
                                </div>
                                <?php
                                        $col_set = 1;
                                        include(locate_template('partials/acf-blocks/block-parts/block-text.php', false, false));
                                        ?>
                                <?php if ($col['vide_source'] === 'local') {
                                            echo do_shortcode("[video src='" . wp_get_attachment_url($col['video-obj']) . "']");
                                        } else {
                                            $video_type = $col['vide_source'];
                                            echo do_shortcode("[video src='" . $col['video_url'] . "']");
                                        }
                                        ?>
                            </div>
                        </div>
                    <?php
                        }
                        $col_set = 0;
                        ?>
                    <div class="col-12 <?php if ($col['text_alignment'] != 'full-text') { ?>col-lg-6<?php }
                                                                                                        if ($col['text_alignment'] === 'text-left') { ?> order-first<?php } ?> tab-content-holder">
                        <div class="heading">
                            <h2 class="animate"><?= $col['heading']; ?></h2>
                            <?php if ($col['sub_heading'] != '') { ?>
                                <div class="intro-conten animatet">
                                    <p><?= $col['sub_heading']; ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <?php include(locate_template('partials/acf-blocks/block-parts/block-text.php', false, false)); ?>
                        <?php include(locate_template('partials/acf-blocks/block-parts/block-ctas.php', false, false)); ?>
                    </div>
                </div>
                <?php
                    if ($col['related_content'] == 1) {
                        ?>
                    <div class="related-content-more">
                        <a href="#related-articles"></a>
                    </div>
                <?php
                    }
                    ?>
            </div>
        <?php
            $runs++;
        }
        ?>
    </div>
    <?php if (is_page(2790)) echo "</div>"; ?>
</div>
<div class="col-12">
    <?php if (is_page(2790)) echo "<div class='container'>"; ?>
    <ul class="nav-tabs mobile row" id="myTab" role="tablist">
        <?php
        $runs = 1;
        foreach ($tab_nav as $k => $t) {
            ?>
            <li class="nav-item col-12 col-md <?php if ($runs == 1) { ?>hidden <?php } ?><?= $t['text_color_override']; ?>">
                <a class="nav-link tab-link <?php if ($runs == 1) { ?>active <?php } ?>solid-background-<?= $t['tab_background'] ?>" id="<?= $k; ?>-tab" data-toggle="tab" href="#<?= $k; ?>" role="tab" data-controls="<?= $k; ?>" data-page-id="<?= get_the_ID(); ?>" <?php if ($t['show_related_content'] == 1) { ?>data-related-content="<?= $t['show_related_content']; ?>" <?php } ?>><?= $t['tab_label']; ?></a>
            </li>
            <?php
            $runs++;
        }
        ?>
    </ul>
    <?php if (is_page(2790)) echo "</div>"; ?>
</div>

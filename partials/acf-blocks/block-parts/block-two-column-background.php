<?php
    $two_col = true;
?>
<div class="col-12 col-lg-6 column-bg two-col-content column-<?= $column_number; ?> <?= $col['text_color_override']; ?><?php if(in_array('video', $col['advanced_sections'])) { ?> has-video<?php } ?> <?php if(isset($col["column_position"]) && !is_array($col["column_position"])) { ?>order-<?= $col["column_position"]; ?><?php } ?><?php if(in_array('content-block', $col['advanced_sections'])) { ?> has-content<?php } ?>">
    <div class="container">
        <div class="row<?php if($col['text_alignment'] === 'text-right') { ?> justify-content-end<?php } ?>">
            <?php if(in_array('video', $col['advanced_sections'])) { ?>
                <div class="<?php if($col['text_alignment'] != 'full-text') { ?>col-lg-6<?php } else { ?>col-12 full-video-btn<?php } ?> <?php if($col['text_alignment'] === 'full-text' || $col['text_alignment'] === 'text-right') { ?>order-first<?php } else { ?>order-last<?php } ?> video-btn-holder animate">
                    <?php if($col['vide_source'] === 'local') {
                        echo do_shortcode("[video src='" . wp_get_attachment_url($col['video-obj']) . "']");
                    } else {
                        $video_type = $col['vide_source'];
                        echo do_shortcode("[video src='" . $col['video_url'] . "']");
                    }
                    ?>
                </div>
            <?php } ?>
            <?php if(in_array('content-block', $col['advanced_sections'])) { ?>
            <div class="col-12 col-lg-9 <?php if($column_number == 2) { ?>offset-lg-1<?php }  ?> <?php if($col['text_alignment'] != 'full-text') { ?>col-lg-6<?php } ?>">
                <div class="row align-content-between">
                    <div class="video-content col-12">
                        <?php if($col['heading'] != '' || $col['sub_heading'] != '') { ?>
                        <div class="heading">
                            <?php if($col['sub_heading'] != '') { ?>
                                <div class="sub-heading animate">
                                    <h3><?= $col['sub_heading']; ?></h3>
                                </div>
                            <?php } ?>
                            <?php if($col['heading'] != '') { ?>
                            <h2 class="animate"><?= $col['heading']; ?></h2>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <?php include( locate_template( 'partials/acf-blocks/block-parts/block-text.php', false, false )); ?>
                        <?php include( locate_template( 'partials/acf-blocks/block-parts/block-accordion.php', false, false )); ?>
                    </div>
                    <div class="video-btn col-12">
                        <?php include( locate_template( 'partials/acf-blocks/block-parts/block-ctas.php', false, false )); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
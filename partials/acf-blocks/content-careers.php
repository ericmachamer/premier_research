<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="column-bg one-column-bg <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row<?php if(get_field('text_alignment') === 'text-right') { ?> justify-content-end<?php } ?>">
            <div class="col-12 text-center">
                <div class="heading">
                    <h2 class="animate"><?= get_field('heading'); ?></h2>
                    <?php if(get_field('sub_heading') != '') { ?>
                        <div class="intro-content animate">
                            <p><?= get_field('sub_heading'); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 35px;">
            <div class="col-12 col-lg-6 text-lg-left text-center">
                <?php get_template_part('partials/acf-blocks/block-parts/block-text'); ?>
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
            <div class="col-12 col-lg-6 careers-holder animate">
                <?php
                global $wpdb;
                $jobs = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'job-openings'" );
                $jobs = unserialize($jobs->option_value);
                $locations_array = [];
                $department_array = [];
                foreach($jobs as $j) {
                    //locations
                    $locations = $j->jobLocations;
                    foreach($locations as $l) {
                        if(!in_array($l->country, $locations_array)){
                            $locations_array[]=$l->country;
                        }
                    }
                }
                //thee_debug($jobs);
                ?>
                <div class="careers-filters">
                    <select name="expertise">
                        <option value="">Select Location</option>
                        <?php
                            foreach($locations_array as $la) {
                        ?>
                                <option value="<?= $la; ?>"><?= $la; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div id="career-holder" class="careers-holder-inner">
                    <div class="row loading-holder">
                        <div class="col-12">
                            <div class="ajax-loading"></div>
                        </div>
                    </div>
                    <ul class="careers row no-gutters">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
global $wpdb;
$jobs = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'job-openings'" );
$jobs = unserialize($jobs->option_value);
$department_array = [];
$jobID = esc_html($_GET['jobID']);
foreach($jobs as $j) {
if($j->eId == $jobID){
?>
<?php  include(locate_template('partials/job-details-hero.php', false, false)); ?>
    <div class="column-bg one-column-bg job-details <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
        <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <?php
                        $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
                    ?>
                    <a href="<?= $uri_parts[0]; ?>" class="back">Back to Careers</a>
                    <div class="clearfix"></div>
                    <?= $j->description; ?>
                    <div class="clearfix"></div>
                    <a href="?apply=true&jobID=<?= $jobID; ?>" class="btn btn-raised btn-outline btn-outline-primary-lighter">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    //thee_debug($j);
    //stop foreach when job is found
    break;
}
}
//thee_debug($jobs);
?>
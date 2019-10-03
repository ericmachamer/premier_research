<?php
    global $wpdb;
    $jobs = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'job-openings'" );
    $jobs = unserialize($jobs->option_value);
    $department_array = [];
    $jobID = esc_html($_GET['jobID']);
    foreach($jobs as $j) {
        if ($j->eId == $jobID) {
            include(locate_template('partials/job-details-hero.php', false, false));
            break;
        }
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <?php
            $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
            ?>
            <a href="<?= $uri_parts[0]; ?>" class="back">Back to Careers</a>
            <div class="clearfix"></div>
            <div class="jv-careersite" data-careersite="premier-research" data-page="job/<?= $jobID; ?>/apply"></div>
            <script src="https://jobs.jobvite.com/__assets__/scripts/careersite/public/iframe.js"></script>
        </div>
    </div>
</div>

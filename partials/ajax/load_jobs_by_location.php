<?php
global $wpdb;
$jobs = $wpdb->get_row( "SELECT option_value FROM $wpdb->options WHERE option_name = 'job-openings'" );
$jobs = unserialize($jobs->option_value);
$department_array = [];
$country = esc_html($_POST['location']);
foreach($jobs as $j) {
    //departments
    $department = $j->department;
    if(!array_key_exists($j->department, $department_array)){
        $department_array[$j->department] = 0;
    }
}
if($country != '') {
    foreach($jobs as $j) {
        /*$value = $department_array[$j->department];
        $value = $value + 1;
        $department_array[$j->department] = $value;*/
        $locations = $j->jobLocations;
        $job_title = [];
        foreach($locations as $l) {
            if($l->country == $country && !in_array($j->title, $job_title)) {
                $value = $department_array[$j->department];
                $value = $value + 1;
                $department_array[$j->department] = $value;
                $job_title[] = $j->title;
            }
        }
    }
}
//thee_debug($department_array);
//thee_debug($jobs);
if($country != '') {
    $has_openings = 0;
    foreach ($department_array as $key => $value) {
        if ($value >= 1) {
            $has_openings = 1;
        ?>
        <li class="col-12">
            <div class="row no-gutters toggle">
                <div class="col-12 col-lg-9">
                    <p class="job-title"><?= $key; ?></p>
                </div>
                <div class="col-12 col-lg-3 text-right"><?php
                    if ($value == 0) {
                        echo 'No Current Openings';
                    } else {
                        echo $value . ' Open Role';
                        if ($value > 1) {
                            echo 's';
                        }
                    }
                    ?>
                </div>
            </div>
            <ul class="inner">
                <?php
                foreach ($jobs as $j) {
                    $locations = $j->jobLocations;
                    $job_title = [];
                    foreach ($locations as $l) {
                        if ($l->country == $country && $j->department == $key && !in_array($j->title, $job_title)) {
                            $job_title[] = $j->title;
                            ?>
                            <li class="row no-gutters" data-href="?jobID=<?= $j->eId; ?>">
                                <div class="col-12 col-lg-9">
                                    <p class="job-title"><a href="?jobID=<?= $j->eId; ?>"><?= $j->title; ?></a></p>
                                    <?php
                                    if(count($j->otherLocations) > 0 ) {
                                        $locations = '';
                                        $runs = 0;
                                        foreach($j->otherLocations as $ol) {
                                            $runs++;
                                            if($runs != 1) {
                                                $locations .= ' / ';
                                            }
                                            $locations .= $ol->location;
                                        }
                                    } else {
                                        $runs = 1;
                                        $locations = $j->location;
                                    }
                                    ?>
                                    <p class="job-locations-title">Location<?php if($runs > 1) { echo 's'; } ?></p>
                                    <p class="job-locations"><?= $locations; ?></p>
                                </div>
                                <div class="col-12 col-lg-3 text-right">
                                    <a href="?jobID=<?= $j->eId; ?>" class="job-link">View Details</a>
                                </div>
                            </li>
                            <?php
                        }
                    }
                }
                ?>
            </ul>
        </li>
        <?php
        }
    }
    if($has_openings != 1) {
        echo '<p class="default-message">There are no current openings for this location.</p>';
    }
} else {
?>
    <p class="default-message">To see job openings please select a country.</p>
<?php
}
?>
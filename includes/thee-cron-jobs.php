<?php
/**
 * Adds weekly cron scheduling option
 */
function thee_add_hourly_schedule($schedules)
{
    $schedules['fifteen_minutes'] = array(
        'interval' => 900, // seconds in a hour
        'display' => __('Once Every 15 minutes')
    );
    return $schedules;
}

add_filter('cron_schedules', 'thee_add_hourly_schedule');


/**
 * Add cron job
 */
if (!wp_next_scheduled("update_jobs")) {
    wp_schedule_event( time() + 10, "fifteen_minutes", "update_jobs" );
}
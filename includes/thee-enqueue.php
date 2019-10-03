<?php

/**
 * Front End CSS
 */
function thee_load_styles()
{
    wp_enqueue_style('fonts', 'https://cloud.typography.com/6372074/7525152/css/fonts.css', array(), false, 'screen');
    wp_enqueue_style('video-js', 'https://vjs.zencdn.net/7.5.4/video-js.css', array(), false, 'screen');
    if (WP_DEBUG) {
        wp_enqueue_style('main-style', get_bloginfo('stylesheet_directory') . '/dist/styles/styles.min.css', array(), false, 'screen');
    } else {
        wp_enqueue_style('main-style', get_bloginfo('stylesheet_directory') . '/dist/styles/styles.min.css', array(), false, 'screen');
    }

}

add_action('wp_enqueue_scripts', 'thee_load_styles');

/**
 * Front End JS
 */
function thee_load_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('popper-js', 'https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js', array('jquery'), false, true);
    wp_enqueue_script('bs-material-js', 'https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js', array('jquery'), false, true);
    wp_enqueue_script('video-js', 'https://vjs.zencdn.net/7.5.4/video.js', array('jquery'), false, true);
    wp_enqueue_script('video-js-vimeo', get_bloginfo('stylesheet_directory') . '/scripts/vendor/videojs-vimeo.min.js', array('jquery'), false, true);
    wp_enqueue_script('video-js-youtube', get_bloginfo('stylesheet_directory') . '/scripts/vendor/Youtube.min.js', array('jquery'), false, true);
    wp_enqueue_script('selectric', get_bloginfo('stylesheet_directory') . '/scripts/vendor/jquery.selectric.js', array('jquery'), false, true);
    wp_enqueue_script('in-view', get_bloginfo('stylesheet_directory') . '/scripts/vendor/in-view.min.js', array('jquery'), false, true);
    // Theme Script
    if (WP_DEBUG) {
        wp_enqueue_script('main', get_bloginfo('stylesheet_directory') . '/dist/scripts/scripts.js', array(), false, true);
    } else {
        wp_enqueue_script('main', get_bloginfo('stylesheet_directory') . '/dist/scripts/scripts.min.js', array(), false, true);
    }

    // Dynamic URLs for use in scripts
    global $wp_query;
    wp_localize_script('main', 'urls', array(
        'base' => get_bloginfo('url'),
        'theme' => get_bloginfo('template_url'),
        'ajax' => admin_url('admin-ajax.php'),
        'posts' => json_encode( $wp_query->query_vars ),
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));

    // Initialize vars for JS
    wp_localize_script('main', 'info', array( /* IDs, etc. */));
}

add_action('wp_enqueue_scripts', 'thee_load_scripts');

/**
 * Admin CSS
 */
function thee_load_admin_styles()
{
    wp_enqueue_style('admin', get_bloginfo('template_url') . '/dist/styles/admin.css');
}

add_action('admin_enqueue_scripts', 'thee_load_admin_styles');
add_action( 'login_enqueue_scripts', 'thee_load_admin_styles' );

/**
 * Admin JS
 */
function thee_load_admin_scripts()
{
    wp_enqueue_script('admin', get_bloginfo('template_url') . '/dist/scripts/admin.js');
}

add_action('admin_enqueue_scripts', 'thee_load_admin_scripts');
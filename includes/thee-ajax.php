<?php
add_action( 'wp_ajax_load_sorted_posts', 'load_sorted_posts' );
add_action( 'wp_ajax_nopriv_load_sorted_posts', 'load_sorted_posts' );
function load_sorted_posts() {
    get_template_part('partials/acf-blocks/block-parts/block-search-cards');
    die();
}

add_action( 'wp_ajax_load_jobs_by_location', 'load_jobs_by_location' );
add_action( 'wp_ajax_nopriv_load_jobs_by_location', 'load_jobs_by_location' );
function load_jobs_by_location() {
    get_template_part('partials/ajax/load_jobs_by_location');
    die();
}

add_action( 'wp_ajax_load_related_posts', 'load_related_posts' );
add_action( 'wp_ajax_nopriv_load_related_posts', 'load_related_posts' );
function load_related_posts() {
    get_template_part('partials/ajax/load_related_articles_from_tabs');
    die();
}

add_action( 'wp_ajax_load_related_experts', 'load_related_experts' );
add_action( 'wp_ajax_nopriv_load_related_experts', 'load_related_experts' );
function load_related_experts() {
    get_template_part('partials/ajax/content-leadership-slider');
    die();
}
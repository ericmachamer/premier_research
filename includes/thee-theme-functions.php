<?php

/**
 * Description of what the function does and how it is used
 *
 * @param string $var Description of the expected input
 * @return string Description of the expected output
 */
function thee_example_function($var)
{
    return $var;
}

/**
 * Generate pagination links
 */
function thee_pagination()
{
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    return paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 1,
        'prev_text' => '<i class="icon icon-angle-left"></i> Previous',
        'next_text' => 'Next <i class="icon icon-angle-right"></i>',
    ));
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page();

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Locations',
        'menu_title' 	=> 'Locations',
        'menu_slug' 	=> 'locations',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false,
        'icon_url' => 'dashicons-location'
    ));

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Blog Settings',
        'menu_title' 	=> 'Blog Settings',
        'menu_slug' 	=> 'blog-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false,
        'icon_url' => 'dashicons-text-page'
    ));

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'News Settings',
        'menu_title' 	=> 'News Settings',
        'menu_slug' 	=> 'news-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false,
        'icon_url' => 'dashicons-megaphone'
    ));

    $option_page = acf_add_options_page(array(
        'page_title' 	=> 'Podcast Settings',
        'menu_title' 	=> 'Podcast Settings',
        'menu_slug' 	=> 'Podcast-settings',
        'capability' 	=> 'edit_posts',
        'redirect' 	=> false,
        'icon_url' => 'dashicons-playlist-audio'
    ));

}



function bootstrap_nav()
{
    wp_nav_menu( array(
            'theme_location'    => 'primary-navigation',
            'depth'             => 2,
            'container'         => 'false',
            'menu_class'        => 'nav justify-content-end',
            'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
            'walker'            => new wp_bootstrap_navwalker())
    );
}

function list_child_pages() {

    global $post;

    $string = '';

    if ( is_page() && $post->post_parent )

        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
    else
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

    if ( $childpages ) {

        $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;

}

/*
 * CPT of Pages
 */
function parent_pages_init() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Parent Pages' ),
        'singular_name'     => __( 'Parent Page' ),
        'search_items'      => __( 'Search Parent Pages' ),
        'all_items'         => __( 'All Parent Pages' ),
        'parent_item'       => __( 'Parent Parent Page' ),
        'parent_item_colon' => __( 'Parent Parent Page:' ),
        'edit_item'         => __( 'Edit Parent Page' ),
        'update_item'       => __( 'Update Parent Page' ),
        'add_new_item'      => __( 'Add New Parent Page' ),
        'new_item_name'     => __( 'New Parent Page' ),
        'menu_name'         => __( 'Parent Page' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'parent-pages' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'parent-pages', array( 'post' ), $args );
}
//add_action( 'init', 'parent_pages_init' );

/*
 * CPT of Therapeutic or Special Population
 */
function expertise_init() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Expertise' ),
        'singular_name'     => __( 'Expertise' ),
        'search_items'      => __( 'Search Expertise' ),
        'all_items'         => __( 'All Expertise' ),
        'parent_item'       => __( 'Parent Expertise' ),
        'parent_item_colon' => __( 'Parent Expertise:' ),
        'edit_item'         => __( 'Edit Expertise' ),
        'update_item'       => __( 'Update Expertise' ),
        'add_new_item'      => __( 'Add New Expertise' ),
        'new_item_name'     => __( 'New Expertise' ),
        'menu_name'         => __( 'Expertise' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'expertise' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'expertise', array( 'post' ), $args );
}
add_action( 'init', 'expertise_init' );

/*
 * CPT of Functional Area
 */
function functional_area_init() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Functional Areas' ),
        'singular_name'     => __( 'Functional Area' ),
        'search_items'      => __( 'Search Functional Areas' ),
        'all_items'         => __( 'All Functional Areas' ),
        'parent_item'       => __( 'Parent Functional Area' ),
        'parent_item_colon' => __( 'Parent Functional Area:' ),
        'edit_item'         => __( 'Edit Functional Area' ),
        'update_item'       => __( 'Update Functional Area' ),
        'add_new_item'      => __( 'Add New Functional Area' ),
        'new_item_name'     => __( 'New Functional Area' ),
        'menu_name'         => __( 'Functional Area' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'functional-area' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'functional-area', array( 'post' ), $args );
}
add_action( 'init', 'functional_area_init' );

/*
 * CPT of Content Type
 */
function content_type_init() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Content Types' ),
        'singular_name'     => __( 'Content Type' ),
        'search_items'      => __( 'Search Content Types' ),
        'all_items'         => __( 'All Content Types' ),
        'parent_item'       => __( 'Parent Content Type' ),
        'parent_item_colon' => __( 'Parent Content Type:' ),
        'edit_item'         => __( 'Edit Content Type' ),
        'update_item'       => __( 'Update Content Type' ),
        'add_new_item'      => __( 'Add New Content Type' ),
        'new_item_name'     => __( 'New Content Type' ),
        'menu_name'         => __( 'Content Type' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'content-type' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'content-type', array( 'post' ), $args );
}
add_action( 'init', 'content_type_init' );

function job_update() {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.jobvite.com/api/v2/job?api=premierresearch_jobfeed_api_key&sc=50979a8d10a9ccab67298939923647a4&jobStatus=Open",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array('Content-type: application/json'),
    ));

    $response = json_decode(curl_exec($curl));
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        //thee_debug($response->requisitions);
        global $wpdb;
        $table = $wpdb->prefix.'options';
        $data = array('option_name' => 'job-openings', 'option_value' => serialize($response->requisitions), 'autoload' => 'no');
        $wpdb->replace($table,$data);
    }
}
add_action('update_jobs', 'job_update');

function url_get_contents ($Url) {
    if (!function_exists('curl_init')){
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function thee_get_previous_posts_link( $label = null ) {
    global $paged;

    if ( null === $label ) {
        $label = __( '&laquo; Previous Page' );
    }

    if ( ! is_single() && $paged > 1 ) {
        /**
         * Filters the anchor tag attributes for the previous posts page link.
         *
         * @since 2.7.0
         *
         * @param string $attributes Attributes for the anchor tag.
         */
        $attr = apply_filters( 'previous_posts_link_attributes', '' );
        return '<a href="' . previous_posts( false ) . "#recent-posts\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
    }
}

function thee_get_next_posts_link( $query = null, $page = null, $label = null, $max_page = 0 ) {
    if(!$query || !$page) {
        global $paged, $wp_query;
    } else {
        $paged = $page;
        $wp_query = $query;
    }

    if ( ! $max_page ) {
        $max_page = $wp_query->max_num_pages;
    }

    if ( ! $paged ) {
        $paged = 1;
    }

    $nextpage = intval( $paged ) + 1;

    if ( null === $label ) {
        $label = __( 'Next Page &raquo;' );
    }

    if ( ! is_single() && ( $nextpage <= $max_page ) ) {
        /**
         * Filters the anchor tag attributes for the next posts page link.
         *
         * @since 2.7.0
         *
         * @param string $attributes Attributes for the anchor tag.
         */
        $attr = apply_filters( 'next_posts_link_attributes', '' );

        return '<a href="' . next_posts( $max_page, false ) . "#recent-posts\" $attr>" . preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label ) . '</a>';
    }
}

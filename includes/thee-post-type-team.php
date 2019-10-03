<?php

$labels = array(
	'name' => 'Leadership',
	'singular_name' => 'Team Member',
	'add_new' => 'Add New',
	'add_new_item' => 'Add New',
	'edit_item' => 'Edit Team Member',
	'new_item' => 'New Team Member',
	'view_item' => 'View Team Member',
	'search_items' => 'Search Teams',
	'not_found' => 'No Teams Found',
	'not_found_in_trash' => 'No Teams Found in Trash',
	'menu_name' => 'Leadership'
);

$args = array(
	'labels' => $labels,
	'description' => '',
	'public' => true,
	'exclude_from_search' => false,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_nav_menus' => false,
	'show_in_menu' => true,
	'show_in_admin_bar' => true,
	'menu_position' => 20,
	'menu_icon' => 'dashicons-groups' , // http://melchoyce.github.io/dashicons/
	'capability_type' => 'page',
	'hierarchical' => true,
	'supports' => array( 'title', 'editor', 'thumbnail' ),
	//'register_meta_box_cb' => 'init_slide_fields',
	'taxonomies' => array(),
	'has_archive' => true,
    'show_in_rest' => true
);

register_post_type( 'leadership', $args );

function leadership_filers() {
    // create a new taxonomy
    $labels = array(
        'name'              => __( 'Filters' ),
        'singular_name'     => __( 'Filter' ),
        'search_items'      => __( 'Search Filter' ),
        'all_items'         => __( 'All Filter' ),
        'parent_item'       => __( 'Parent Filter' ),
        'parent_item_colon' => __( 'Parent Filter:' ),
        'edit_item'         => __( 'Edit Filter' ),
        'update_item'       => __( 'Update Filter' ),
        'add_new_item'      => __( 'Add New Filter' ),
        'new_item_name'     => __( 'New Filter' ),
        'menu_name'         => __( 'Filters' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'leadership-filers' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'leadership-filers', array( 'leadership' ), $args );
}
add_action( 'init', 'leadership_filers' );
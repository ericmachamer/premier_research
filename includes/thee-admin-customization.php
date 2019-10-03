<?php

/**
 * Remove dashboard meta boxes
 */
function thee_remove_dashboard_widgets()
{
    // remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // Right Now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); // Incoming Links
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); // Plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // Quick Press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); // Recent Drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'side'); // Other WordPress News
}

add_action('wp_dashboard_setup', 'thee_remove_dashboard_widgets');

/**
 * Unregisters unnecesary default widgets
 */
function thee_unregister_default_wp_widgets()
{
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Tag_Cloud');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Categories');
    // unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Nav_Menu_Widget');
    unregister_widget('GFWidget');
}

add_action('widgets_init', 'thee_unregister_default_wp_widgets');

/**
 * Hide admin pages that are not used
 */
function thee_remove_menu_pages()
{
    remove_menu_page('edit-comments.php'); // Comments
    remove_menu_page('edit.php');    // Posts
}

//add_action('admin_menu', 'thee_remove_menu_pages');

/**
 * Change admin menu order
 */
function thee_menu_order($menu_ord)
{
    if (!$menu_ord) return true;
    return array(
        // 'index.php', // Dashboard
        // 'separator1', // First separator
        // 'edit.php?post_type=page', // Pages
        // 'edit.php', // Posts
        // 'upload.php', // Media
        // 'gf_edit_forms', // Gravity Forms
        // 'edit-comments.php', // Comments
        // 'separator2', // Second separator
        // 'themes.php', // Appearance
        // 'plugins.php', // Plugins
        // 'users.php', // Users
        // 'tools.php', // Tools
        // 'options-general.php', // Settings
        // 'separator-last', // Last separator
    );
}

add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', 'thee_menu_order');

/**
 * Customizes the editor role
 * Adds theme option and gravity form capabilities
 */
function thee_customize_editor_role()
{
    $role = get_role('editor');

    // Provides editor access to widgets and menus
    $role->add_cap('edit_theme_options');

    $role->add_cap('gravityforms_edit_forms');
    $role->add_cap('gravityforms_delete_forms');
    $role->add_cap('gravityforms_create_form');
    $role->add_cap('gravityforms_view_entries');
    $role->add_cap('gravityforms_edit_entries');
    $role->add_cap('gravityforms_delete_entries');
    $role->add_cap('gravityforms_export_entries');
    $role->add_cap('gravityforms_view_entry_notes');
    $role->add_cap('gravityforms_edit_entry_notes');
}

//add_filter('after_switch_theme', 'thee_customize_editor_role');

/**
 * Removes admin bar items
 */
function thee_remove_admin_bar_items()
{
    global $wp_admin_bar;
    // $wp_admin_bar->remove_menu('comments');
}

add_action('wp_before_admin_bar_render', 'thee_remove_admin_bar_items');

/**
 * Remove default link option for images
 */
function thee_imagelink_setup()
{
    $image_set = get_option('image_default_link_type');
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}

add_action('admin_init', 'thee_imagelink_setup', 10);

/**
 * Enable more WYSIWYG editor buttons
 */
function thee_enable_mce_buttons($buttons)
{
    $buttons[] = 'subscript';
    $buttons[] = 'superscript';

    return $buttons;
}

//add_filter('mce_buttons_2', 'thee_enable_mce_buttons');

/**
 * Remove post_tags and categories from admin
 */
function thee_unregister_default_taxonomies()
{
    unregister_taxonomy_for_object_type( 'category', 'post' );
}
add_action('init', 'thee_unregister_default_taxonomies');

/*
* Creating a function to create our CPT
*/

function all_shortcodes() {
    $labels = array(
        'name'                => _x( 'Shortcodes', 'Post Type General Name' ),
        'singular_name'       => _x( 'Shortcodes', 'Post Type Singular Name' ),
        'menu_name'           => __( 'Shortcodes' ),
        'parent_item_colon'   => __( 'Parent Shortcodes' ),
        'all_items'           => __( 'All Shortcodes' ),
        'view_item'           => __( 'View Shortcodes' ),
        'add_new_item'        => __( 'Add New Shortcodes' ),
        'add_new'             => __( 'Add New' ),
        'edit_item'           => __( 'Edit Shortcodes' ),
        'update_item'         => __( 'Update Shortcodes' ),
        'search_items'        => __( 'Search Shortcodes' ),
        'not_found'           => __( 'Not Found' ),
        'not_found_in_trash'  => __( 'Not found in Trash' ),
    );

    $args = array(
        'label'               => __( 'shortcodes' ),
        'description'         => __( 'Add Shortcodes as you create them. Give a description about what the shortcode does.' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'excerpt' ),
        'taxonomies'          => array( ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'can_export'          => false,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'menu_icon'   => 'dashicons-sos',
        'capability_type'     => 'page',
    );

    register_post_type( 'shortcodes', $args );

}


// add_action( 'init', 'all_shortcodes', 0 );

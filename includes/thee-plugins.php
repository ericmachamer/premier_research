<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/vendor/class-tgm-plugin-activation.php';

/**
 * Register the required/recommended plugins for this theme
 */
function thee_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'		=> 'Advanced Custom Fields PRO',
			'slug'		=> 'advanced-custom-fields-pro',
			'source'	=> 'http://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=b3JkZXJfaWQ9MzM0MjB8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA4IDAxOjM1OjQ4',
			'required'	=> true
		),
        array(
            'name'		=> 'Advanced Custom Fields: Font Awesome Field',
            'slug'		=> 'advanced-custom-fields-font-awesome',
            'required'	=> true
        ),
        array(
            'name'      => 'Advanced Custom Fields: Gravityforms Add-on',
            'slug'      => 'acf-gravityforms-add-on',
            'required'  => true
        ),
        array(
            'name'		=> 'Yoast SEO',
            'slug'		=> 'wordpress-seo',
            'required'	=> true
        ),
		array(
			'name'		=> 'Regenerate Thumbnails',
			'slug'		=> 'regenerate-thumbnails',
			'required'	=> false
		),
        array(
            'name'		=> 'reSmush.it Image Optimizer',
            'slug'		=> 'resmushit-image-optimizer',
            'required'	=> true
        ),
		array(
			'name'		=> 'Gravity Forms',
			'slug'		=> 'gravity-forms',
            'source'	=> 'http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.3.2.10.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1530112654&Signature=8%2BqlXqInwqXJb72gPUIoHqew3TA%3D',
			'required'	=> true
		),
        array(
            'name'		=> 'Toolbar Publish Button',
            'slug'		=> 'toolbar-publish-button',
            'required'	=> true
        ),
        array(
            'name'		=> 'User Role Editor',
            'slug'		=> 'user-role-editor',
            'required'	=> true
        )
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'thee-tgmpa',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => ''         			   // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'thee_plugins' );
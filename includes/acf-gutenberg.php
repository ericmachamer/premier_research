<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

    // check function exists
    if( function_exists('acf_register_block') ) {
        acf_register_block(array(
            'name'				=> 'cards',
            'title'				=> __('Cards'),
            'description'		=> __('A custom cards block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'screenoptions',
            'keywords'			=> array( 'cards' ),
        ));
        acf_register_block(array(
            'name'				=> 'hero',
            'title'				=> __('Hero'),
            'description'		=> __('A custom hero block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'screenoptions',
            'keywords'			=> array( 'hero' ),
        ));
        acf_register_block(array(
            'name'				=> 'column-background',
            'title'				=> __('Text with Background'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23.05 21.81"><defs><style>.cls-1{fill:#555d66;}.cls-1,.cls-2{stroke:#555d66;stroke-miterlimit:10;}.cls-2{fill:none;}</style></defs><title>Asset 5</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-1" x="0.5" y="0.5" width="22.05" height="3.39"/><rect class="cls-1" x="0.5" y="5.54" width="22.05" height="1.33"/><rect class="cls-1" x="0.5" y="8.52" width="15.81" height="1.33"/><rect class="cls-2" x="0.5" y="15.5" width="19.03" height="5.81" rx="0.89"/></g></g></svg>',
            'keywords'			=> array( 'column' ),
        ));
        acf_register_block(array(
            'name'				=> 'contact-block',
            'title'				=> __('Contact Us'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'contact' ),
        ));
        acf_register_block(array(
            'name'				=> 'spotlight-block',
            'title'				=> __('Spotlight Block'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'resource' ),
        ));
        acf_register_block(array(
            'name'				=> 'two-column-background',
            'title'				=> __('Two Column Background'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'two column', 'background' ),
        ));
        acf_register_block(array(
            'name'				=> 'slider',
            'title'				=> __('Slider'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'slider' ),
        ));
        acf_register_block(array(
            'name'				=> 'tabs',
            'title'				=> __('Tabs'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'tabs' ),
        ));
        acf_register_block(array(
            'name'				=> 'leadership-hero',
            'title'				=> __('Leadership Hero'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'leadership', 'hero' ),
        ));
        acf_register_block(array(
            'name'				=> 'content-block',
            'title'				=> __('Content Block'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'content' ),
        ));
        acf_register_block(array(
            'name'				=> 'resource-list',
            'title'				=> __('Resource List'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'leadership', 'content' ),
        ));
        acf_register_block(array(
            'name'				=> 'expertise-content',
            'title'				=> __('Expertise Content'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'expertise', 'content' ),
        ));
        acf_register_block(array(
            'name'				=> 'careers',
            'title'				=> __('Careers'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'careers' ),
        ));
        acf_register_block(array(
            'name'				=> 'leadership-slider',
            'title'				=> __('Leadership Slider'),
            'description'		=> __('A custom call-out block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'slides',
            'keywords'			=> array( 'leadership', 'slider' ),
        ));
        acf_register_block(array(
            'name'				=> 'locations-list',
            'title'				=> __('Locations List'),
            'description'		=> __('A custom locations block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-site',
            'keywords'			=> array( 'locations' ),
        ));
        acf_register_block(array(
            'name'				=> 'ta-experience-content',
            'title'				=> __('TA Experience Content Block'),
            'description'		=> __('A custom experience content block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-site',
            'keywords'			=> array( 'experience', 'content' ),
        ));
        acf_register_block(array(
            'name'				=> 'spotlight-block-text-under',
            'title'				=> __('Spotlight Block w/Text Under'),
            'description'		=> __('A custom spotlight block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-site',
            'keywords'			=> array( 'spotlight' ),
        ));
        acf_register_block(array(
            'name'				=> 'podcast-inline',
            'title'				=> __('Inline Podcast'),
            'description'		=> __('A custom inline podcast block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'playlist-audio',
            'keywords'			=> array( 'podcast' ),
        ));
        acf_register_block(array(
            'name'				=> 'two-column-leadership',
            'title'				=> __('Two Column Leadership'),
            'description'		=> __('A custom two column leadership block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'screenoptions',
            'keywords'			=> array( 'two column', 'leadership' ),
        ));
        acf_register_block(array(
            'name'				=> 'three-column-leadership',
            'title'				=> __('Three Column Leadership'),
            'description'		=> __('A custom three column leadership block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'screenoptions',
            'keywords'			=> array( 'three column', 'leadership' ),
        ));
        acf_register_block(array(
            'name'				=> 'management-copy',
            'title'				=> __('Management Copy'),
            'description'		=> __('A custom management copy block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'screenoptions',
            'keywords'			=> array( 'management', 'leadership' ),
        ));
        acf_register_block(array(
            'name'				=> 'single-expert-callout',
            'title'				=> __('Single Expert Callout'),
            'description'		=> __('A custom single expert callout block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'businessperson',
            'keywords'			=> array( 'expert', 'single', 'leadership' ),
        ));
        acf_register_block(array(
            'name'				=> 'vp-leadership',
            'title'				=> __('VP Leadership'),
            'description'		=> __('A custom leadership block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-users',
            'keywords'			=> array( 'single', 'vp', 'leadership' ),
        ));
        acf_register_block(array(
            'name'				=> 'resource-callout',
            'title'				=> __('Resource Callout'),
            'description'		=> __('A custom resource callout block.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-users',
            'keywords'			=> array( 'resource', 'callout' ),
        ));
        acf_register_block(array(
            'name'				=> 'contact-alt-block',
            'title'				=> __('Contact Alternative'),
            'description'		=> __('A custom contact callout block like the one on Careers.'),
            'render_callback'	=> 'my_acf_block_render_callback',
            'category'			=> 'layout',
            'icon'				=> 'admin-users',
            'keywords'			=> array( 'alternative', 'contact' ),
        ));
    }
}

function my_acf_block_render_callback( $block ) {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "partials/acf-blocks" folder
    if( file_exists(STYLESHEETPATH . "/partials/acf-blocks/content-{$slug}.php") ) {
        include( STYLESHEETPATH . "/partials/acf-blocks/content-{$slug}.php" );
    }
}

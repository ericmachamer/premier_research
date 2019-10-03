<?php

function resources_cpt_generating_rule($wp_rewrite) {
    $rules = array();
    $terms = get_terms( array(
        'taxonomy' => 'content-type',
        'hide_empty' => false,
    ) );
    $post_type = 'post';
    foreach ($terms as $term) {

        $rules[$term->slug . '/([^/]*)$'] = 'index.php?post_type=' . $post_type. '&resources_post_type=$matches[1]&name=$matches[1]';

    }
    // merge with global rules
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'resources_cpt_generating_rule');

function change_link( $permalink, $post ) {
    if( $post->post_type == 'post' ) {
        $resource_terms = get_the_terms( $post, 'content-type' );
        $term_slug = '';
        if( ! empty( $resource_terms ) ) {
            foreach ( $resource_terms as $term ) {
                // The featured resource will have another category which is the main one
                $term_slug = $term->slug;
                break;
            }
        }
        $permalink = get_home_url() . '/' . $term_slug . '/' . $post->post_name;
    }
    return $permalink;
}
add_filter('post_type_link',"change_link",10,2);

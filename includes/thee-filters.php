<?php

    add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

    function form_submit_button( $button, $form ) {
        if($form['id'] == '6' || $form['id'] == '4' || $form['id'] == '5') {
            $btnClass = 'full-btn btn-outline btn-outline-primary-lighter';
        } else if($form['title'] != 'Sidebar') {
            $btnClass = 'btn-primary';
        } else {
            $btnClass = 'btn-secondary';
        }
        return "<button class='btn btn-raised {$btnClass}' id='gform_submit_button_{$form['id']}'><span>{$form['button']['text']}</span></button>";
    }

add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
//add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $button_span = $dom->createElement( 'span', $input->getAttribute( 'value' ) );
    $new_button->appendChild( $button_span );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
        $new_button->setAttribute( $attribute->name, $attribute->value );
    }
    $input->parentNode->replaceChild( $new_button, $input );
    return $dom->saveHtml( $new_button );
}

    function new_excerpt_more($more) {
        return '...';
    }
    add_filter('excerpt_more', 'new_excerpt_more');
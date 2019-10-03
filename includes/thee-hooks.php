<?php
//add_filter( 'gform_field_container', 'my_field_container', 10, 6 );
function my_field_container( $field_container, $field, $form, $css_class, $style, $field_content ) {
    return '<li class="form-group">{FIELD_CONTENT}</li>';
}

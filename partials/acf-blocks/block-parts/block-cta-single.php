<?php
/*
 * This is used for single button groups
 */
$button = get_sub_field('button');
$target = '_self';
$link_type = $button['link_type'];
$btn_type = $button['type'];
$btn_outline_color = $button['outline_color'];
/*
 * Set $url for link
 * Set $target for link
 */
if($link_type === 'anchor') {
    $url = $button['anchor_link'];
} else if($link_type === 'external') {
    $url = $button['external_link'];
    $target = '_blank';
} else {
    $url = $button['internal_link'];
}
/*
 * Set button class
 */
if($btn_type === 'text') {
    $btn_class = 'btn-link';
} else {
    $btn_class = 'btn-outline';
}
if($btn_outline_color === 'dark') {
    $btn_class .= ' btn-outline-primary-lighter';
} else {
    $btn_class .= ' btn-outline-white';
}
?>
<a class="btn btn-raised <?= $btn_class; ?>" href="<?= $url; ?>" target="<?= $target; ?>"><?= $button['label']; ?></a>
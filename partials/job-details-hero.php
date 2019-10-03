<?php
$text_align = get_field('careers_hero_content_position', 'option');
$background = '';
$background_type = get_field('careers_hero_background_type', 'option');
$background_shade = 'light';
if($background_type === 'solid') {
    $background_color = get_field('careers_hero_background_color', 'option');
    switch($background_color) {
        case 'white':
            $color = '#fff';
            break;
        case 'light':
            $color = '#F8F8F8';
            break;
        case 'dark':
            $color = '#505050';
            $background_shade = 'dark';
            break;
        default:
            $color = '#fff';
    }
    $background .= 'background-color: ' . $color . ';';
}
$foreground_image = get_field('careers_hero_foreground_image', 'option');
$background_image = get_field('careers_hero_hero_image', 'option');
$size = 'bg-block';
$foreground_image = wp_get_attachment_image_src($foreground_image, $size);
$background_image = wp_get_attachment_image_src($background_image, $size);
if(isset($background_image[0]) && $background_type === 'image') {
    $background_image = 'url(' . $background_image[0] . ")";
}else {
    $background_image = 'url()';
}
$background .= ' background-image: ' . $background_image . ';'
?>
<div class="header-hero header-gap job-details-hero <?= $background_shade; ?> <?= get_field('careers_hero_hero_text_color', 'option'); ?><?php if($text_align === 'right') { echo ' content-right'; } ?>" style="<?= $background; ?>">
    <div class="container">
        <div class="row text-center text-lg-left">
            <div class="col-12">
                <h1><?= $j->title; ?></h1>
                <?php
                    if(count($j->otherLocations) > 0 ) {
                        $locations = '';
                        $runs = 1;
                        foreach($j->otherLocations as $ol) {
                            if($runs != 1) {
                                $locations .= ' / ';
                            }
                            $locations .= $ol->location;
                            $runs++;
                        }
                    } else {
                        $locations = $j->location;
                    }
                ?>
                <p class="sub-head"><?= $locations; ?></p>
            </div>
        </div>
    </div>
</div>

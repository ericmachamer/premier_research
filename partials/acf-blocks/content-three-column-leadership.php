<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="three-column-leaders solid-background-<?= get_field('background')['color']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title"><?= get_field('title'); ?></h2>
            </div>
            <?php
            if( have_rows('leaders') ) {
                while ( have_rows('leaders') ) {
                    the_row();
                    $leader = get_sub_field('leader_select');
                    $content =  parse_blocks(get_post_field('post_content', $leader));
                    //thee_debug($content);
                    $headshot = get_post_thumbnail_id($leader);
                    $category = '';
                    $sub_title_1 = '';
                    $sub_title_2 = '';
                    $sub_title_3 = '';
                    foreach ($content as $ei) {
                        if ($ei['blockName'] == 'acf/management-copy') {
                            $category = $ei['attrs']['data']['leadership_category'];
                            $sub_title_1 = $ei['attrs']['data']['leadership_title_0_title_line'];
                            $sub_title_2 = $ei['attrs']['data']['leadership_title_1_title_line'];
                            $sub_title_3 = $ei['attrs']['data']['leadership_title_2_title_line'];
                            break;
                        }
                    }
                    if(get_sub_field('image_overwrite') != '') {
                        $headshot = get_sub_field('image_overwrite');
                    }
                    if($headshot == '') {
                        $headshot = get_field('management_default_no_image', 'option');
                    }
                    $size = 'bg-block';
                    $headshot_image = wp_get_attachment_image_src($headshot, $size);
                    ?>
                    <div class="col-12 col-sm-6 col-md-4 col-xl-3 leader-holder light animate
                    delay">
                        <div class="leader">
                            <div class="boom-headshot" style="background-image: url(<?= $headshot_image[0]; ?>);"></div>
                            <div class="leadership-text">
                                <div class="pre-title">
                                    <h3><?= $category; ?></h3>
                                </div>
                                <div class="name">
                                    <h2><?= get_the_title($leader); ?></h2>
                                </div>
                                <div class="title">
                                    <p class="text"><?php if($sub_title_1 != '') { echo $sub_title_1; } ?><?php if($sub_title_2 != '') { echo ', '.$sub_title_2; } ?><?php if($sub_title_3 != '') { echo ', '.$sub_title_3; } ?></p>
                                </div>
                                <a href="<?= get_the_permalink($leader); ?>" class="full-btn btn btn-raised btn-outline btn-outline-primary-lighter">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

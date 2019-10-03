<?php
    $background_image = get_field('background');
    $size = 'bg-block';
    $background_image = wp_get_attachment_image_src($background_image['image']['ID'], $size);
    /*
     *  get_field('text_color_override') is based on the background color for the code. If a user selects light the value will be dark and vice versa
     */
?>
<div class="two-column-leaders">
    <div class="row no-gutters">
        <?php
        if( have_rows('leaders') ) {
            while ( have_rows('leaders') ) {
                the_row();
                $leader = get_sub_field('leader_select');
                $content =  parse_blocks(get_post_field('post_content', $leader));
                //thee_debug($expert_info);
                foreach ($content as $ei) {
                    if ($ei['blockName'] == 'acf/leadership-hero') {
                        $headshot = $ei['attrs']['data']['hero_image'];
                        $sub_title_1 = $ei['attrs']['data']['hero_subheadline_0_title_line'];
                        $sub_title_2 = $ei['attrs']['data']['hero_subheadline_1_title_line'];
                        $sub_title_3 = $ei['attrs']['data']['hero_subheadline_2_title_line'];
                        break;
                    }
                }
                if(get_sub_field('image_overwrite') != '') {
                    $headshot = get_sub_field('image_overwrite');
                }
                $size = 'bg-block';
                $headshot_image = wp_get_attachment_image_src($headshot, $size);
                ?>
                <div class="col-12 col-lg-6 leader-holder dark" style="background-image: url(<?=
                $headshot_image[0]; ?>);">
                    <div class="leader">
                        <div class="leadership-text">
                            <div class="name animate">
                                <h2><?= get_the_title($leader); ?></h2>
                            </div>
                            <div class="title animate">
                                <p class="text"><?php if(isset($sub_title_1)) { echo $sub_title_1; } ?></p>
                            </div>
                            <a href="<?= get_the_permalink($leader); ?>" class="full-btn btn btn-raised btn-outline btn-outline-primary-lighter animate">Read
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

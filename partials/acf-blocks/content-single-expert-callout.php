<section class="expert-holder column-bg wrapper text-center text-lg-left <?= get_field('text_color_override'); ?><?php if(get_field('background')['use_paralax_scrolling'] === true) { echo ' paralax'; } ?>" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" <?php if(get_field('background')['opacity']) { ?>style="opacity: <?= get_field('background')['opacity']/100; ?>;"<?php } ?>></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $heading = get_field('experts_heading');

                if ($heading) {
                    ?>
                    <div class="heading">
                        <h2><?= $heading; ?></h2>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            $leader = get_field('experts');
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
            if($headshot == '') {
                $headshot = get_post_thumbnail_id($leader);
            }
            ?>
            <div class="col-12 expert-content <?php if(get_field('background')['color'] != 'transparent') { echo 'dark'; } ?>">
                <?php
                if(get_field('image_overwrite') != '') {
                    $headshot = get_field('image_overwrite');
                }
                $size = 'bg-block';
                $headshot_image = wp_get_attachment_image_src($headshot, $size);
                ?>
                <div class="headshot" style="background-image: url(<?= $headshot_image[0]; ?>);"></div>
                <div class="leader">
                    <div class="leadership-text">
                        <div class="name">
                            <h2><?= get_the_title($leader); ?></h2>
                        </div>
                        <div class="title">
                            <p class="text"><?php if(isset($sub_title_1)) { echo $sub_title_1; } ?><?php if(isset($sub_title_2)) { echo ', '.$sub_title_2; } ?><?php if(isset($sub_title_3)) { echo ', '.$sub_title_3; } ?></p>
                        </div>
                        <div class="excerpt">
                            <?= get_field('excerpt'); ?>
                        </div>
                        <div class="cta-holder">
                            <?php
                            $permalink = get_the_permalink($leader);
                            $filter_object = get_the_terms($leader, 'leadership-filers');
                            $mt = true;
                            foreach($filter_object as $fo) {
                                if($fo->slug == 'senior-leaders') {
                                    $mt = false;
                                }
                            }
                            if($mt == true) {
                                $permalink = '/our-company/leadership/management-team#'.strtolower(str_replace(' ', '-', get_the_title($leader)));
                            }
                            ?>
                            <a href="<?= $permalink; ?>" class="full-btn btn btn-raised btn-outline btn-outline-white">Read
                                More</a>
                            <a href="/our-company/leadership" class="full-btn btn btn-raised btn-outline btn-outline-white">Our People</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

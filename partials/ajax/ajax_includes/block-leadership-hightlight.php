<section class="expert-holder related-tabs column-bg wrapper text-center text-lg-left" style="background-image: url('<?= $background_image[0]; ?>');">
    <div class="background-overlay solid-background-<?= $background_color; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                $heading = $tab_data['tabs_'.$adjust_tab.'_tab_group_highlighted_expert_heading'];

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
            $leader = $tab_data['tabs_'.$adjust_tab.'_tab_group_highlighted_expert_expert'];
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
            ?>
            <div class="col-12 expert-content <?php if(get_field('background')['color'] != 'transparent') { echo 'dark'; } ?>">
                <?php
                if($tab_data['tabs_'.$adjust_tab.'_tab_group_highlighted_expert_image_overwrite'] != '') {
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
                            <?= $tab_data['tabs_'.$adjust_tab.'_tab_group_highlighted_expert_excerpt']; ?>
                        </div>
                        <div class="cta-holder">
                            <a href="<?= get_the_permalink($leader); ?>" class="full-btn btn btn-raised btn-outline btn-outline-white">Read
                                More</a>
                            <a href="/our-company/leadership" class="full-btn btn btn-raised btn-outline btn-outline-white">Our People</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
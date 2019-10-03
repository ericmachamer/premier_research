<section class="vp-leadership">
    <div class="container">
    <?php
    $post_objects = get_field('leader_select');
    foreach($post_objects as $post_object) {
        $leader = $post_object->ID;
        $content =  parse_blocks(get_post_field('post_content', $leader));
        //thee_debug($content);
        foreach ($content as $ei) {
            if ($ei['blockName'] == 'acf/management-copy') {
                $vp_title = $ei['attrs']['data']['leadership_category'];
                $sub_title_1 = $ei['attrs']['data']['leadership_title_0_title_line'];
                $sub_title_2 = $ei['attrs']['data']['leadership_title_1_title_line'];
                $sub_title_3 = $ei['attrs']['data']['leadership_title_2_title_line'];
                $content_block = $ei['attrs']['data']['content'];
            }
        }
        $headshot = get_post_thumbnail_id($leader);
        $size = 'featured-thumb-large';
        $headshot_image = wp_get_attachment_image_src($headshot, $size);
        $anchor_link = strtolower(str_replace(' ', '-', get_the_title($leader)));
        ?>
        <div id="<?= $anchor_link; ?>" class="row vp-leadership-holder">
            <div class="col-12">
                <div class="leadership-img <?php if($headshot_image == '') { echo 'no-image'; } ?> animate">
                    <div class="leadership-img-holder" style="background-image: url(<?= $headshot_image[0]; ?>);"></div>
                </div>
                <div class="leadership-content animate">
                    <?php if(isset($vp_title)) { ?>
                        <div class="vp-title-line">
                            <h3><?= $vp_title; ?></h3>
                        </div>
                    <?php } ?>
                    <div class="name">
                        <h2><?= get_the_title($leader); ?></h2>
                    </div>
                    <div class="title">
                        <p class="text"><?php if(isset($sub_title_1)) { echo $sub_title_1; } ?><?php if(isset($sub_title_2)) { echo ', '.$sub_title_2; } ?><?php if(isset($sub_title_3)) { echo ', '.$sub_title_3; } ?></p>
                    </div>
                    <div class="content">
                        <?= wpautop($content_block); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    wp_reset_postdata();
    ?>
    </div>
</section>

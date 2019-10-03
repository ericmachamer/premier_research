<div id="slider-<?= $block['id']; ?>" class="block-slider row no-gutters card-group">
    <?php
    $args = array(
        'post_type'     => 'leadership',
        'orderby'       => 'menu_order',
        'posts_per_page' => -1,
        'post__in'      => get_field('experts'),
        'post_status'   => 'publish',
        'post__not_in' => array(get_the_ID())
    );
    $experts = new WP_Query($args);
    while ($experts->have_posts()) :
        $experts->the_post();
        ?>
        <div class="slide card col <?= get_field('text_color_override'); ?>">
            <?php
            $expert_info = parse_blocks(get_the_content());
            //thee_debug($expert_info);
            $headshot = '';
            foreach($expert_info as $ei) {
                if ($ei['blockName'] == 'acf/leadership-hero') {
                    $headshot = $ei['attrs']['data']['foreground_image'];
                    break;
                }
            }
            if($headshot == '') {
                $headshot = get_post_thumbnail_id();
            }
            if($headshot == '') {
                $headshot = get_field('management_default_no_image', 'option');
            }
            $size = 'featured-thumb-large';
            $headshot_image = wp_get_attachment_image_src($headshot, $size);
            ?>
            <div class="card-img-holder">
                <img class="card-img-top" src="<?= $headshot_image[0]; ?>" alt="<?= get_the_title(); ?>" />
            </div>
            <div class="card-body">
                <h3><?= get_the_title(); ?></h3>
                <?php
                foreach($expert_info as $ei) {
                    $sub_title_1 = NULL;
                    $sub_title_2 = NULL;
                    $sub_title_3 = NULL;
                    if($ei['blockName'] == 'acf/leadership-hero') {
                        $sub_title_1 = $ei['attrs']['data']['hero_subheadline_0_title_line'];
                        $sub_title_2 = $ei['attrs']['data']['hero_subheadline_1_title_line'];
                        $sub_title_3 = $ei['attrs']['data']['hero_subheadline_2_title_line'];
                        break;
                    } else if($ei['blockName'] == 'acf/management-copy') {
                        $sub_title_1 = $ei['attrs']['data']['leadership_title_0_title_line'];
                        $sub_title_2 = $ei['attrs']['data']['leadership_title_1_title_line'];
                        $sub_title_3 = $ei['attrs']['data']['leadership_title_2_title_line'];
                        break;
                    }
                }
                ?>
                <div class="text"><?php if(isset($sub_title_1)) { echo $sub_title_1; } ?><?php if(isset($sub_title_2)) { echo ', '.$sub_title_2; } ?><?php if(isset($sub_title_3)) { echo ', '.$sub_title_3; } ?></div>
            </div>
            <div class="card-footer">
                <div class="cta">
                    <?php
                    $permalink = get_permalink();
                    $filter_object = get_the_terms(get_the_ID(), 'leadership-filers');
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
                    <a href="<?= $permalink; ?>" class="btn btn-raised btn-outline <?= $btn_class; ?>">More</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

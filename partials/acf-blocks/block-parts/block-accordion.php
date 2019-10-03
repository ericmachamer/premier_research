<?php
    if(isset($column) && ($column === 'column_1' || $column === 'column_2')) {
        $advanced_sections = $col['advanced_sections'];
    } else {
        $advanced_sections = get_field('advanced_sections');
    }
?>
<?php if(in_array('accordion', $advanced_sections)) { ?>
    <div id="accordion">
        <?php
        if( have_rows('accordion_items') ) {
            $runs = 1;
            while (have_rows('accordion_items')) {
                the_row();
                ?>
                <div class="accordion-holder">
                    <div class="accordion-header" id="heading<?= $runs; ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link <?php if($runs != '1') { echo 'collapsed'; } ?>" data-toggle="collapse" data-target="#collapse<?= $runs; ?>" aria-expanded="true" aria-controls="collapse<?= $runs; ?>">
                                <?= get_sub_field('header'); ?>
                            </button>
                        </h5>
                    </div>

                    <div id="collapse<?= $runs; ?>" class="collapse <?php if($runs === 1) { echo 'show'; } ?>" aria-labelledby="heading<?= $runs; ?>" data-parent="#accordion">
                        <div class="accordion-body">
                            <?=  apply_filters( 'the_content', get_sub_field('content')); ?>
                            <?php
                            $target = '_self';
                            $link_type = get_sub_field('link_type');
                            $btn_type = get_sub_field('type');
                            /*
                             * Set $url for link
                             * Set $target for link
                             */
                            if($link_type === 'anchor') {
                                $url = get_sub_field('anchor_link');
                            } else if($link_type === 'external') {
                                $url = get_sub_field('external_link');
                                $target = '_blank';
                            } else {
                                $url = get_sub_field('internal_link');
                            }
                            /*
                             * Set button class
                             */
                            if($btn_type === 'text') {
                                $btn_class = 'btn-link';
                            } else {
                                $btn_class = 'btn-secondary';
                            }
                            if(get_sub_field('label') != '') {
                                $label = get_sub_field('label');
                            } else {
                                $label = 'Read More';
                            }
                            ?>
                            <a class="btn btn-raised <?= $btn_class; ?>" href="<?= $url; ?>" target="<?= $target; ?>"><?= $label; ?></a>
                        </div>
                    </div>
                </div>
                <?php
                $runs++;
            }
        }
        ?>
    </div>
<?php } ?>
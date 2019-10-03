<section class="cards column-bg wrapper">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-12 <?php if(have_rows('calls_to_action')) { ?>col-lg-8<?php } ?>">
                <?php
                $heading = get_field('title');
                $desc = get_field('content');

                if ($heading) {
                    ?>
                    <header class="section-content">
                        <h2 class="title animate"><?php echo $heading ?></h2>
                        <?php
                        if ($desc) {
                            ?>
                            <div class="desc animate"><?php echo $desc ?></div>
                            <?php
                        }
                        ?>
                    </header>
                    <?php
                }
                ?>
            </div>
            <?php
                if(have_rows('calls_to_action')) {
            ?>
            <div class="col-12 col-lg-4 full-btn width-100">
                <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="row card-deck">
            <?php get_template_part('partials/acf-blocks/block-parts/block-cards'); ?>
        </div>
    </div>
</section>
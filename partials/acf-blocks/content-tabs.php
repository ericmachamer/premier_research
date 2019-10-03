<section class="tabs contact-block <?= get_field('container_background'); ?>">
    <div class="<?php if (!is_page(2790)) echo "container"; ?>">
        <?php if (is_page(2790)) echo "<div class='container'>"; ?>
        <div class="row align-items-center">
            <div class="col-12<?php if (have_rows('calls_to_action')) { ?> col-lg-8<?php } ?> top-content">
                <?php
                $heading = get_field('pre_tab_title');
                $desc = get_field('content');

                if ($heading || $desc) {
                    ?>
                    <header class="section-content">
                        <?php if ($heading) { ?>
                            <h2 class="title animate"><?php echo $heading ?></h2>
                        <?php
                            }
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
            <?php if (have_rows('calls_to_action')) { ?>
                <div class="col-12 col-lg-4 full-btn">
                    <?php get_template_part('partials/acf-blocks/block-parts/block-ctas'); ?>
                </div>
            <?php } ?>
        </div>
        <?php if (is_page(2790)) echo "</div>"; ?>
        <div class="row tabs-holder">
            <?php include(locate_template('partials/acf-blocks/block-parts/block-tabs.php', false, false)); ?>
        </div>
</section>
<?php
$related = 0;
foreach ($tab_nav as $k => $t) {
    if ($t['show_related_content'] == 1) {
        $related = 1;
        break;
    }
}
if ($related == 1) {
    ?>
    <div class="col-12 <?php if (is_page(2790)) echo "light-bg"; ?>">
        <div class="search-resources">
            <div class="container">
                <div id="related-articles" class="row card-holder"></div>
            </div>
        </div>
    </div>
<?php
}
?>
<?php
    $background_color = get_field('experts_background');
    $btn_class = ' btn-outline-white';
    if(get_field('experts_background') === 'gray') {
        $btn_class = ' btn-outline-primary-lighter';
    }
?>
<div class="expert-slides">
    <section class="slides column-bg wrapper text-center text-lg-left <?= $background_color; ?>">
        <div class="overlay" style="opacity: <?= get_field('background_opactiy') / 100; ?>"></div>
        <div class="container">
            <div class="row justify-content-center justify-content-lg-start">
                <div class="col-12">
                    <?php
                    $heading = get_field('experts_heading');
                    $desc =get_field('experts_content');

                    if ($heading) {
                        ?>
                        <div class="heading">
                            <h2><?= $heading; ?></h2>
                            <?php if($desc != '') { ?>
                                <div class="intro-content">
                                    <?= $desc; ?>
                                </div>
                            <?php } ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php include(locate_template('partials/acf-blocks/block-parts/block-leadership-slides.php', false, false));?>
        </div>
    </section>
</div>

<section class="image-bullets wrapper">
    <div class="container">
        <div class="row title">
            <div class="col-12">
                <?php
                $heading = get_field('title');
                if ($heading) {
                    ?>
                    <header class="section-content">
                        <h5 class="title animate"><?php echo $heading ?></h5>
                    </header>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="row content">
            <?php
            if( have_rows('repeater_field_name') ) {
                while ( have_rows('repeater_field_name') ) {
                    the_row();
            ?>
                    <div class="col-12 col-lg-6 image-bullet-content">
                        <div class="bullet">

                        </div>
                        <div class="text">
                            <?= get_sub_field('content'); ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>
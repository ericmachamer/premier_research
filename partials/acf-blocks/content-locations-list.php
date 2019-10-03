<section class="locations-list">
    <div class="container">
        <?php if(get_field('title') != '') { ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="page-title"><?= get_field('title'); ?></h2>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row has-background">
            <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" <?php if(get_field('background')['opacity']) { ?>style="opacity: .<?= get_field('background')['opacity']; ?>;"<?php } ?>></div>
            <div class="col-12 col-md-8">
                <div class="row locations">
                <?php
                if( have_rows('option_locations', 'option') ) {
                    while ( have_rows('option_locations','option') ) {
                        the_row();
                        if(get_sub_field('country')['label'] != 'United States') {
                            ?>
                            <div class="col-auto location-holder">
                                <h2><?= get_sub_field('country')['label']; ?></h2>
                                <div class="location-details">
                                    <?php
                                    if (get_sub_field('include_sub_locations')) {
                                        $location = get_sub_field('sub_locations');
                                        //thee_debug($location);
                                        foreach ($location['sub_locations'] as $l) {
                                            ?>
                                            <h3><?= $l['header']; ?></h3>
                                            <div class="address">
                                                <div class="address-line-1"><?= $l['address_line_1']; ?></div>
                                                <div class="address-line-2"><?= $l['address_line_2']; ?></div>
                                                <div class="address-line-3"><?= $l['address_line_3']; ?></div>
                                            </div>
                                            <div class="contact-methods">
                                                <?php
                                                if ($l['phone']) {
                                                    ?>
                                                    <div class="phone">Tel: <a
                                                                href="tel:<?= $l['phone']; ?>">+ <?= $l['phone']; ?></a>
                                                    </div>
                                                    <?php
                                                }
                                                if ($l['fax']) {
                                                    ?>
                                                    <div class="fax">Fax: <span
                                                                class="unstyle">+ <?= $l['fax']; ?></span></div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                        <?php
                                    } else {
                                        $location = get_sub_field('no_sub_heads');
                                        ?>
                                        <div class="address">
                                            <div class="address-line-1"><?= $location['address_line_1']; ?></div>
                                            <div class="address-line-2"><?= $location['address_line_2']; ?></div>
                                            <div class="address-line-3"><?= $location['address_line_3']; ?></div>
                                        </div>
                                        <div class="contact-methods">
                                            <?php
                                            if ($location['phone']) {
                                                ?>
                                                <div class="phone">Tel: <a
                                                            href="tel:<?= $location['phone']; ?>">+ <?= $location['phone']; ?></a>
                                                </div>
                                                <?php
                                            }
                                            if ($location['fax']) {
                                                ?>
                                                <div class="fax">Fax: <span
                                                            class="unstyle">+ <?= $location['fax']; ?></span></div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
                </div>
            </div>
            <div class="col-12 col-md-4 order-first order-md-last">
                <div class="row locations us">
                    <?php
                    if( have_rows('option_locations', 'option') ) {
                        while ( have_rows('option_locations','option') ) {
                            the_row();
                            if(get_sub_field('country')['label'] == 'United States') {
                                ?>
                                <div class="col-auto location-holder">
                                    <h2><?= get_sub_field('country')['label']; ?></h2>
                                    <div class="location-details united-states">
                                        <?php
                                        if (get_sub_field('include_sub_locations')) {
                                            $location = get_sub_field('sub_locations');
                                            //thee_debug($location);
                                            foreach ($location['sub_locations'] as $l) {
                                                ?>
                                                <div class="sub-details">
                                                    <h3><?= $l['header']; ?></h3>
                                                    <div class="address">
                                                        <div class="address-line-1"><?= $l['address_line_1']; ?></div>
                                                        <div class="address-line-2"><?= $l['address_line_2']; ?></div>
                                                        <div class="address-line-3"><?= $l['address_line_3']; ?></div>
                                                    </div>
                                                    <div class="contact-methods">
                                                        <?php
                                                        if ($l['phone']) {
                                                            ?>
                                                            <div class="phone">Tel: <a
                                                                        href="tel:<?= $l['phone']; ?>">+ <?= $l['phone']; ?></a>
                                                            </div>
                                                            <?php
                                                        }
                                                        if ($l['fax']) {
                                                            ?>
                                                            <div class="fax">Fax: <span
                                                                        class="unstyle">+ <?= $l['fax']; ?></span></div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
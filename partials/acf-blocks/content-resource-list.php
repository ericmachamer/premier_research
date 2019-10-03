<section class="search-resources wrapper show-on-load">
    <div class="background-overlay solid-background-<?= get_field('background')['color']; ?>" style="opacity: <?= get_field('background')['opacity'] / 100; ?>"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 text-center">
                <?php
                $heading = get_field('title');
                $desc = get_field('content');

                if ($heading) {
                    ?>
                <header class="section-content">
                    <h2 class="title"><?php echo $heading ?></h2>
                    <?php
                        if ($desc) {
                            ?>
                    <div class="desc"><?php echo $desc ?></div>
                    <?php
                        }
                        ?>
                </header>
                <?php
                }
                ?>
            </div>

        </div>
        <div class="row search-holder">
            <div class="col-12">
                <form method="post" name="resource-search">
                    <input name="search" placeholder="Enter a custom keyword search here…" type="search" />
                    <span class="submit-holder">
                        <input type="submit" value="Search" />
                    </span>
                </form>
            </div>
        </div>
        <div class="row search-filters">
            <div class="filter-wrap col-12 col-md-4">
                <label for="expertise">By expertise area</label>
                <select name="expertise">
                    <option class="hidden" value=""></option>
                    <option value="all">All expertise areas</option>
                    <?php
                    $categories = get_terms('expertise', array(
                        'hide_empty' => 0,
                    ));
                    foreach ($categories as $c) {
                        echo '<option value="' . $c->term_id . '">' . $c->name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="filter-wrap col-12 col-md-4">
                <label for="functional">By functional area</label>
                <select name="functional">
                    <option class="hidden" value=""></option>
                    <option value="all">All functional areas</option>
                    <?php
                    $categories = get_terms('functional-area', array(
                        'hide_empty' => 1,
                    ));
                    foreach ($categories as $c) {
                        echo '<option value="' . $c->term_id . '">' . $c->name . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="filter-wrap col-12 col-md-4">
                <label for="resource">By resource type</label>
                <select name="resource">
                    <option class="hidden" value=""></option>
                    <option value="all">All resource types</option>
                    <?php
                    $categories = get_terms('content-type', array(
                        'hide_empty' => 0,
                        'exclude' => array(48, 50, 51, 52, 572)
                    ));
                    foreach ($categories as $c) {
                        echo '<option value="' . $c->term_id . '">' . $c->name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div id="card-holder" class="row card-holder"></div>
        <div class="row loading-holder">
            <div class="col-12">
                <div class="ajax-loading"></div>
            </div>
        </div>
        <div id="load-more" class="row justify-content-center">
            <div class="col-auto">
                <button id="load-more-btn" class="btn btn-outline btn-outline-primary-lighter">Load More Posts</button>
            </div>
        </div>
    </div>
</section>
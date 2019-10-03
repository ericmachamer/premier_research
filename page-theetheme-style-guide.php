<div id="thee-style-guide" class="container style-guide">
    <div class="row">
        <div class="col-2 style-guide-nav">
            <ul></ul>
        </div>
        <div class="col">
        <?php
        /* Bootstrap elements */
            get_template_part('partials/style-guide/columns');
            get_template_part('partials/style-guide/images');
            get_template_part('partials/style-guide/nav');
            get_template_part('partials/style-guide/buttons');
            get_template_part('partials/style-guide/typography');
            get_template_part('partials/style-guide/tables');
            get_template_part('partials/style-guide/forms');
            get_template_part('partials/style-guide/navs');
            get_template_part('partials/style-guide/indicators');
            get_template_part('partials/style-guide/progress');
            get_template_part('partials/style-guide/container');
            get_template_part('partials/style-guide/dialogs');
            get_template_part('partials/style-guide/borders');
            get_template_part('partials/style-guide/embeds');
            get_template_part('partials/style-guide/shadows');
            get_template_part('partials/style-guide/spacing');
        /* end Bootstrap elements */
        /* custom elements */
            if( have_rows('flex_content') ):
                while ( have_rows('flex_content') ) : the_row();
                    $name = str_replace('_','-', get_row_layout());
            ?>
                <div id="<?= $name; ?>" class="bs-docs-section">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1><?= ucwords(str_replace('-', ' ', $name)); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="bs-component">
            <?php
                    if( get_row_layout() == 'flex_graphic_columns' ):
                        get_template_part('partials/graphic-columns');
                    elseif( get_row_layout() == 'flex_background_box' ):
                        get_template_part('partials/bg-block');
                    elseif( get_row_layout() == 'two_column' ):
                        get_template_part('partials/two-column');
                    elseif( get_row_layout() == 'people_slider' ):
                        get_template_part('partials/people-slider');
                    elseif( get_row_layout() == 'latest_news' ):
                        get_template_part('partials/latest-news');
                    endif;
            ?>
                    </div>
                </div>
            <?php
                endwhile;
            endif;
        ?>
    </div>
    <div id="source-modal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Source Code</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <pre contenteditable></pre>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
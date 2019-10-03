<aside class="sidebar col-sm-4">
<?php
    global $post;
    $children = get_pages( array( 'child_of' => $post->ID ) );
    if( is_page() && $post->post_parent || count( $children ) > 0 ) {
?>
        <div class="sidebar-menu">
            <h4><a href="<?= get_permalink( $post->post_parent ); ?>" <?php if($post->post_parent === 0) { ?>class="active"<?php } ?>><?= get_the_title( $post->post_parent ); ?></a></h4>
            <?= list_child_pages(); ?>
        </div>
<?php
    }
    if((get_option('page_for_posts', true) || is_singular('post')) && !is_singular('page')) {
?>
        <div class="sidebar-menu">
            <h4>Categories</h4>
            <ul>
                <?= wp_list_categories(array('hide_empty' => true, 'title_li' => '')); ?>
            </ul>
        </div>
<?php
    }
?>
    <div class="sidebar-form container">
        <div class="row">
            <div class="col-12">
                <h4><?= get_field('form_header', 'option'); ?></h4>
                <?= get_field('form_description', 'option'); ?>
                <?php gravity_form( get_field('sidebar_form', 'option') ?: 1, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = false, $echo = true );
                ?>
            </div>
        </div>
    </div>
</aside>
<?php
    get_template_part('partials/head');
    $extra_class = '';
    if(isset($_GET['apply'])) {
        $extra_class = 'apply-page';
    }
?>
<body <?php body_class($extra_class); ?>>
	<?= get_field('google_analytics_bodytag', 'option') ?>
<div class="content-wrapper">
<?php
do_action('get_header');
get_template_part('partials/header');
?>
    <?php $blocks = parse_blocks( $post->post_content ); ?>
    <main class="main <?php if ( isset($blocks[0]) && $blocks[0]['blockName'] != null && $blocks[0]['blockName'] != 'core/heading' && $blocks[0]['blockName'] != "core/paragraph" ) {
        echo 'has-block';
    }; ?>">
        <?php
            if(isset($_GET['apply']) && $_GET['apply'] == 'true' && $_GET['jobID']) {
                get_template_part('partials/job-apply');
            } else if($_GET['jobID'] && !isset($_GET['apply'])) {
                get_template_part('partials/job-details');
            } else if(isset($_GET['s'])) {
                get_template_part('search');
            } else if(get_page_template_slug() == 'page-blog.php' || is_author()) {
                get_template_part('partials/blog');
            } else if(get_page_template_slug() == 'page-contact.php') {
                get_template_part('page-contact');
            } else if(is_home() && !is_front_page()) {
                get_template_part('partials/news');
            } else if(is_single() && get_post_type() != 'leadership') {
                if(has_term('news', 'content-type')) {
                    get_template_part('single-news');
                } else {
                    get_template_part('single');
                }
            } else if(is_tag() || is_tax()) {
                get_template_part('archive-tags');
            } else if(get_page_template_slug() == 'page-events.php') {
                get_template_part('page-events');
            } else if(get_post_type() == 'leadership') {
                get_template_part('single-leadership');
            } else if(is_404()) {
                get_template_part('404');
            } else {
                the_content();
            }
        ?>
</main>
</div>
<?php
do_action('get_footer');
get_template_part('partials/footer');
?>
</body>
</html>

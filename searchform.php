<form role="search" method="get" class="search-form" action="<?= esc_url( home_url( '/' ) ); ?>">
    <span class="screen-reader-text"><?= _x( 'Search for:', 'label' ); ?></span>
    <input type="search" class="search-field" value="<?= get_search_query(); ?>" name="s" placeholder="Search for…" />
    <input type="submit" class="search-submit" value="<?= esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>
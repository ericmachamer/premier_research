<?php
require get_theme_root() . '/' . get_template() . '/plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://gitlab.com/eric56/theetheme/',
    get_theme_root() . '/' . get_template() . '/style.css',
    'TheeTheme'
);
$myUpdateChecker->setAuthentication(array(
    'consumer_key' => '',
    'consumer_secret' => ''
));
$myUpdateChecker->setBranch('v1');
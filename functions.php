<?php

function lme_custom_theme_resource() {
  wp_enqueue_style('style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'lme_custom_theme_resource');

//navigation menus
register_nav_menus(array(
  'primary' => __( 'Primary Menu' ),
  'footer' => __( 'Footer Menu'),
));

?>

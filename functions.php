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

// Add featured image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 180, 120, true);
  add_image_size('banner-image', 920, 210, array('left', 'top'));

  //Add post format support
  add_theme_support('post-formats', array('aside', 'gallery', 'link'));

//get top get_top_ancestor
function get_top_ancestor_id() {
  global $post;
  if ($post->post_parent) {
    $ancestors = array_reverse(get_post_ancestors($post->ID));
    return $ancestors[0];
  }
  return $post->ID;
}

//does page have children
function has_children() {
  global $post;

  $pages = get_pages('child_of=' . $post->ID);
  return count($pages);
}

//font awesome
add_action( 'wp_enqueue_scripts', 'tthq_add_custom_fa_css' );

function tthq_add_custom_fa_css() {
wp_enqueue_style( 'custom-fa', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css' );
}
?>
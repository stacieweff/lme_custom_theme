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

// Add Widget Areas
function ourWidgetsInit() {
	
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar1',
		'before_widget' => '<div class="widget-item">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
  ));
  
  register_sidebar( array(
		'name' => 'Home Page Widget',
    'id' => 'homepageinfo',
    'before_widget' => '<div>',
		'after_widget' => '</div>',
	));
	
	// register_sidebar( array(
	// 	'name' => 'Footer Area 1',
	// 	'id' => 'footer1',
	// 	'before_widget' => '<div class="widget-item">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h2 class="widget-title">',
	// 	'after_title' => '</h2>',
	// ));
	
	// register_sidebar( array(
	// 	'name' => 'Footer Area 2',
	// 	'id' => 'footer2',
	// 	'before_widget' => '<div class="widget-item">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h2 class="widget-title">',
	// 	'after_title' => '</h2>',
	// ));
	
	// register_sidebar( array(
	// 	'name' => 'Footer Area 3',
	// 	'id' => 'footer3',
	// 	'before_widget' => '<div class="widget-item">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h2 class="widget-title">',
	// 	'after_title' => '</h2>',
	// ));
	
	// register_sidebar( array(
	// 	'name' => 'Footer Area 4',
	// 	'id' => 'footer4',
	// 	'before_widget' => '<div class="widget-item">',
	// 	'after_widget' => '</div>',
	// 	'before_title' => '<h2 class="widget-title">',
	// 	'after_title' => '</h2>',
	// ));
	
}

add_action('widgets_init', 'ourWidgetsInit');


/////////////////////////////////////
// Register Widgets
/////////////////////////////////////

// if ( function_exists('register_sidebar') ) {
// 	register_sidebar(array(
// 		'name' => 'Homepage Widget Area',
// 		'before_widget' => '<div class="home-widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3 class="widget"><span class="widget">',
// 		'after_title' => '</span></h3>',
// 	));
// }

// if ( function_exists('register_sidebar') ) {
// 	register_sidebar(array(
// 		'name' => 'Sidebar Widget Area',
// 		'before_widget' => '<div class="sidebar-widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3 class="widget"><span class="widget">',
// 		'after_title' => '</span></h3>',
// 	));
// }

// if ( function_exists('register_sidebar') ) {
// 	register_sidebar(array(
// 		'name' => 'Footer Widget Area',
// 		'before_widget' => '<div class="footer-widget">',
// 		'after_widget' => '</div>',
// 		'before_title' => '<h3>',
// 		'after_title' => '</h3>',
// 	));
// }

// include("widgets/widget-facebook.php");
// include("widgets/widget-tabs.php");
// include("widgets/widget-list.php");
// include("widgets/widget-car.php");
// include("widgets/widget-cat2.php");
// include("widgets/widget-recent.php");
// include("widgets/widget-ad.php");
// include("widgets/widget-social.php");

/////////////////////////////////////
// Add Bread Crumbs
/////////////////////////////////////

function dimox_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = ' / '; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb

  global $post;
  $homeLink = get_bloginfo('url');

  if (is_home() || is_front_page()) {

    if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

  } else {

    echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . single_cat_title('', false) . $after;

    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;

    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;

    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;

    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }

    echo '</div>';

  }
} // end dimox_breadcrumbs()
?>
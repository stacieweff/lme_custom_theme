<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post">
  <div class="content-wrapper-cat">
    <div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div>
    <h1><?php the_title(); ?></h1>
    <p class="post-info">
      <?php the_time('F jS, Y, g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
      <?php
      $categories = get_the_category();
      $separator = ", ";
      $output = '';

      if ($categories) {
        foreach ($categories as $category) {
          $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
        }
        echo trim($output, $separator);
      }
      ?>
    </p>

    <?php the_content(); ?>
    </div>
    <div class="background-image-stripe"> </div>
  </article>

  <?php endwhile;
else :
  echo '<p>No content found</p>';
endif;

get_footer();
?>

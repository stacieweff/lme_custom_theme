<?php

/*Template Name: Product */

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div class="background-image-stripe"> </div>
    <div class="content-wrapper">
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </article>

  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();
?>

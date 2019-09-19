<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div class="content-wrapper-cat">
      <div class="title-column">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="text-column">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="background-image-stripe"> </div>
  </article>

  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();
?>
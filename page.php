<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>


  <article class="post page">
    <div class="content-wrapper">
    <span class="parent_link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()) ?>"><?php echo get_the_title(get_top_ancestor_id()) ?></a></span>
    <?php
      $args = array(
        'child_of' => get_top_ancestor_id(),
        'title_li' => ''
      )
      ?>
      <?php wp_list_pages($args) ?>
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

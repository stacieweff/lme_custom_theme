<?php

get_header();

if (have_posts()) : ?>
<div class="search-results-heading">
<h2>Search Results for: <?php the_search_query() ?></h2>
</div>

<?php
  while (have_posts()) : the_post();

  get_template_part('category', get_post_format());


  endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();
?>

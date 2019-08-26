<?php
get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div class="content-wrapper">
      <div class="title-column">
        <!-- <h2><?php the_title(); ?></h2> -->
      </div>
      <div class="text-column">
        <?php the_content(); ?>
      </div>
      <?php
      $args = array(
        'child_of' => get_top_ancestor_id(),
        'title_li' => ''
      )
      ?>
      <?php wp_list_pages($args) ?>
      <div class="home-columns clearfix">
        <div class="news-block-wrapper">
          <div class="news-block-container">
            <?php
            //products posts start here
            $productPosts = new WP_Query('cat=4');
            if ($productPosts->have_posts()) :
              while ($productPosts->have_posts()) : $productPosts->the_post(); ?>
              <div class="news-block">
                <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                  <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
                  </div>
                </div>
                <div class="text-container">
                  <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                    <!-- <div class="news-excerpt"><?php the_excerpt(); ?></div> -->
                  </div>
                </div>
                   <?php endwhile;
                 else :
                   echo '<p>No content found</p>';
                 endif;
                 wp_reset_postdata();
              ?>
          </div>
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

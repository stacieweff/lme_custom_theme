<?php

/*Template Name: Product */

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <!-- <?php if ( has_children() OR $post->post_parent > 0 ) { ?>
      <nav class="site-nav children-links clearfix">
        <span class="parent-link"><a href="<?php echo get_the_permalink(get_top_ancestor_id()) ?>"><?php echo get_the_title(get_top_ancestor_id()) ?></a></span>
        <ul>
          <?php
            $args = array(
              'child_of' => get_top_ancestor_id(),
              'title_li' => ''
            )
            ?>
            <?php wp_list_pages($args) ?>
        </ul>
      </nav>
    <?php } ?> -->
    <div class="content-page">
        <?php the_content(); ?>

        <!-- <div class="testing-this">
        <?php dynamic_sidebar('productnav') ?>
        </div> -->

          <?php
            //products posts start here
            $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
            global $post;
            $post_slug = $post->post_name;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => $post_slug,
                'posts_per_page' => 15,
                'paged' => $paged,
            );
            $productPosts = new WP_Query( $args );
            if($productPosts->have_posts()) { ?>
              <h2>Related Products</h2>
              <div class="products-container">
            <?php }
            if ($productPosts->have_posts()) :
              while ($productPosts->have_posts()) : $productPosts->the_post(); ?>
                  <div class="products-card">
                      <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                        <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
                        </div>
                      </div>
                      <div class="text-container">
                           <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                      </div>
                  </div>
              <?php endwhile; ?>
                </div>
              <?php else :
                   echo '';
                 endif;
                 wp_reset_postdata();
              ?>
              <?php wp_pagenavi(
                            array(
                                'query' => $productPosts,
                            )
                        );
                        ?>
        

        <?php if (is_page(93)) { ?>
            <?php
            //deliveries posts start here
            $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'deliveries',
                'posts_per_page' => 15,
                'paged' => $paged,
            );
            $productPosts = new WP_Query( $args );
            if($productPosts->have_posts()) { ?>
              <h2>Recent Deliveries</h2>
              <div class="products-container">
            <?php }
            if ($productPosts->have_posts()) :
              while ($productPosts->have_posts()) : $productPosts->the_post(); ?>
                  <div class="products-card">
                     <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                       <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
                       </div>
                     </div>
                     <div class="text-container">
                           <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                      </div>
                  </div>
              
              <?php endwhile; ?>
              </div>
              <?php else :
                   echo '';
                 endif;
                 wp_reset_postdata();
              ?>
              <?php wp_pagenavi(
                            array(
                                'query' => $productPosts,
                            )
                        );
                        ?>
        <?php }?>
      

      <!-- <?php
    // query for the about page
    // $your_query = new WP_Query( 'pagename=equipment' );
    // "loop" through query (even though it's just one page) 
    // while ( $your_query->have_posts() ) : $your_query->the_post(); ?>
    <h2>Vendors</h2>    
    <?php //the_content();
    // endwhile;
    // reset post data (important!)
    // wp_reset_postdata();
?> -->

</div>
    <!-- <div class="background-image-stripe"> </div> -->
  </article>

  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();
?>

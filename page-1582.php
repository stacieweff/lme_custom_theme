<?php
get_header();
if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div>
      <div class="content-page">
        <div class="text-column">
          <?php the_content(); ?>
        </div>
        <div class="custom-content-container">
          <h2>Featured Equipment</h2>
          <div class="products-container">
                  <?php
                  //products posts start here
                  // $productPosts = new WP_Query('cat=4');
                  $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                  $args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => 'products',
                      'posts_per_page' => 10,
                      'paged' => $paged,
                  );
                  $productPosts = new WP_Query( $args );
                  if ($productPosts->have_posts()) :
                    while ($productPosts->have_posts()) : $productPosts->the_post(); ?>
                        <div class="products-card">
                          <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                            <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
                            </div>
                          </div>
                          <div class="text-container">
                                <div class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            </div>
                        </div>
                    <?php endwhile;
                      else :
                        echo '<p>No content found</p>';
                      endif;
                      wp_reset_postdata();
                    ?>
          </div>
                    <?php wp_pagenavi(
                                  array(
                                      'query' => $productPosts,
                                  )
                              );
                              ?>

        </div>


        <h2>Vendors</h2>
        <p>We sell a variety of products from the following suppliers:</p>
        <div class="vendor-container">
                  <?php
                  $vendorPosts = new WP_Query( 'cat=19&posts_per_page=-1' );
                  if ($vendorPosts->have_posts()) :
                    while ($vendorPosts->have_posts()) : $vendorPosts->the_post(); ?>
                        <div class="vendor-block">
                          <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                            <div class="background-thumbnail"><a href="<?php echo get_the_excerpt() ?>" target="_blank"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                            </div>
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
  </article>


  <?php endwhile;

else :
  echo '<p>No content found</p>';

endif;

get_footer();
?>

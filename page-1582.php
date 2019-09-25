<?php
get_header();
if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div class="page-wrapper">
      <?php if ( has_children() OR $post->post_parent > 0 ) { ?>
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
        <?php } ?>

        <div class="content-page">
          <div class="title-column">
            <!-- <h2><?php the_title(); ?></h2> -->
          </div>
          <div class="text-column">
            <?php 
              the_content();
            ?>
          </div>
        <!-- </div> -->
      <!-- <div class="page-content-custom"> -->
        <div class="custom-content-container">
          <div class="left-content">
            <h2>Recent Product News</h2>
            <div class="products-container">
                  <?php
                  //products posts start here
                  // $productPosts = new WP_Query('cat=4');
                  $paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
                  $args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'category_name' => 'products',
                      'posts_per_page' => 15,
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
                                <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
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
            <!-- <div class="right-content">
              <div class="testing-this">
                <?php dynamic_sidebar('contact') ?>
              </div>
            </div> -->
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

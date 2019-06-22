<?php get_header(); ?>

<div class="site-content clearfix">
  <div class="main-image">
    <?php if(have_posts()) :
      while(have_posts()) : the_post();

      the_content();

    endwhile;

    else :
      echo '<p>No content found</p>';

    endif; ?>

    <div class="main-image-widget">
      <p class="main-info-title">Everything for Firefighting</p>
      <ul class="main-info-offerings">
        <li>FIRE APPARATUS</li>
        <li>BREATHING APPARATUS</li>
        <li>PERSONAL PROTECTIVE EQUIPMENT</li>
        <li>TEST INSTRUMENTS</li>
        <li>HOSE, NOZZLES, FITTINGS & ADAPTER TOOLS</li>
        <li>EXTRICATION EQUIPMENT SYSTEMS</li>
      </ul>
    </div>
  </div>
    <div class="home-columns clearfix">
      <div class="news-block-wrapper">
        <div class="news-block-heading"><h1>Recent News</h1></div>
        <div class="news-block-container">
          <?php
          //news posts start here
          //&orderby=title&order=ASC
          $newsPosts = new WP_Query('cat=3&posts_per_page=6');
                 if ($newsPosts->have_posts()) :
                   while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>

                   <div class="news-block">
                     <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                       <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                         <div class="text-container">
                           <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                           <!-- <div class="news-excerpt"><?php the_excerpt(); ?></div> -->
                         </div>
                       </div>
                     </div>
                   </div>

                    <!-- <article class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">

                      <div class="post-thumbnail">
                         <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                      </div>

                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <?php the_excerpt(); ?>

                    </article> -->

                   <?php endwhile;

                 else :
                   echo '<p>No content found</p>';

                 endif;
                 wp_reset_postdata();
            ?>
        </div>
      </div>

      <div class="apparatus-dealer-wrapper">
        <div class="apparatus-dealer-header"><h1>Apparatus Dealers</h1></div>
        <div class="apparatus-dealer-container">
              <?php
              $appdealersPosts = new WP_Query('cat=11&posts_per_page=4');
                    if ($appdealersPosts->have_posts()) :
                      while ($appdealersPosts->have_posts()) : $appdealersPosts->the_post(); ?>



                  <div class="apparatus-dealer-block">
                     <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                       <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                       </div>
                     </div>
                   </div>

                      <!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
                      <!-- <?php the_excerpt(); ?> -->

                      <?php endwhile;

                    else :
                      echo '<p>No content found</p>';

                    endif;
                    wp_reset_postdata();
              ?>
        </div>
      </div>

      <div class="vendor-wrapper">
        <div class="vendor-header"><h1>Featured Vendors</h1></div>
        <div class="vendor-container">
              <?php
              $featuredVendorsPosts = new WP_Query('tag=featured-product&posts_per_page=4');
                    if ($featuredVendorsPosts->have_posts()) :
                      while ($featuredVendorsPosts->have_posts()) : $featuredVendorsPosts->the_post(); ?>



                  <div class="vendor-block">
                     <div class="post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
                       <div class="background-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
                       </div>
                     </div>
                   </div>

                      <!-- <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> -->
                      <!-- <?php the_excerpt(); ?> -->

                      <?php endwhile;

                    else :
                      echo '<p>No content found</p>';

                    endif;
                    wp_reset_postdata();
              ?>
        </div>
      </div>


    </div>
</div>

<?php
get_footer();
?>
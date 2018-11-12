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
    <!-- <div class="home-columns clearfix">
      <div class="one-half">
        <?php
        //opinion posts start here
        //&orderby=title&order=ASC
        $deliveryPosts = new WP_Query('cat=2&posts_per_page=2');
               if ($deliveryPosts->have_posts()) :
                 while ($deliveryPosts->have_posts()) : $deliveryPosts->the_post(); ?>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>

                 <?php endwhile;

               else :
                 echo '<p>No content found</p>';

               endif;
               wp_reset_postdata();
               ?>
      </div>
      <div class="one-half last">
        <?php
        $newsPosts = new WP_Query('cat=3&posts_per_page=2');
               if ($newsPosts->have_posts()) :
                 while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>

                 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                 <?php the_excerpt(); ?>

                 <?php endwhile;

               else :
                 echo '<p>No content found</p>';

               endif;
               wp_reset_postdata();
        ?>
      </div>
    </div> -->
</div>

<?php
get_footer();
?>

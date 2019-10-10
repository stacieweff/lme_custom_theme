<?php get_header();?>
<div class="content-wrapper-cat">
  <h1 class="page-header headline"><?php single_cat_title(); ?></h1>
  <div class="category-content">
    <div class="category-posts-section">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <article class="category-post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
        <div class="post-thumbnail">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-thumbnail'); ?></a>
        </div>
        <div class="post-content">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p class="post-info"><?php the_time('F jS, Y, g:i a'); ?> | by <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in

          <?php
          $categories = get_the_category();
          $separator = ", ";
          $output = '';

          if ($categories) {
            foreach ($categories as $category) {
              $output .= '<a href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>' . $separator;
            }

            echo trim($output, $separator);
          }
          ?>
          <?php if ( is_search() OR is_archive() ) { ?>
            <p class="post-excerpt"><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>"> Read more&raquo;</a></p>
          <?php } else {

            if ($post->post_excerpt) { ?>
              <p class="post-excerpt"><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>"> Read more&raquo;</a></p>

            <?php } else {
              the_content();
            }

          } ?>

          </p>
        </div>
      </article>

      <?php endwhile;
      else :
        echo '<p>No content found</p>';
      endif; ?>
      <?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
    </div>
    <div class="sidebar-categories">
      <?php get_sidebar() ?>
    </div>
  </div>
</div>
<div class="background-image-stripe"> </div>
<?php get_footer(); ?>
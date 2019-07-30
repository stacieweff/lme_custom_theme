<?php
get_header();?>

<div class="background-image-stripe"> </div>
    <div class="content-wrapper-cat">
<!-- <div class="category-content"> -->
<h1 class="page-header headline"><?php single_cat_title(); ?></h1>

<div>We are distributors for: 
  <ul class="main-info-offerings">
        <li>FIRE APPARATUS</li>
        <li>BREATHING APPARATUS</li>
        <li>PERSONAL PROTECTIVE EQUIPMENT</li>
        <li>TEST INSTRUMENTS</li>
        <li>HOSE, NOZZLES, FITTINGS & ADAPTER TOOLS</li>
        <li>EXTRICATION EQUIPMENT SYSTEMS</li>
  </ul>

  <p>Therefore, we can help with many different products working with all of our Vendors. Browse our products listed, but if you don't see something, give us a call and we can most likely still help you get it!</p>
</div>
<h2>Featured Products</h2>
  <div class="">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();?>

  <article class="category-post <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>">
  <!--post thumbnail-->
  <div class="post-thumbnail">
    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail'); ?></a>
  </div>
  <div class="post-content">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
  <p><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read more&raquo;</a></p>
<?php } else {

  if ($post->post_excerpt) { ?>
    <p><?php echo get_the_excerpt(); ?><a href="<?php the_permalink(); ?>">Read more&raquo;</a> </p>

  <?php } else {
    the_content();
  }

} ?>

</p>
  </div>

  <!-- <?php the_content('Continue reading...'); ?> -->



</article>

      <?php endwhile;

    else :
      echo '<p>No content found</p>';

    endif; ?>
    <?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?>
  </div>
</div>

<?php
get_footer();
?>
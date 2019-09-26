<?php

get_header();

if (have_posts()) :
  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <div class="content-wrapper-cat">
      <div class="title-column">
        <h2><?php the_title(); ?></h2>
      </div>
      <div class="contact-us-section">
          <div class="contact-info">
            <i class="fas fa-phone contact-icon"></i>
            <span class="contact-data">St. Louis Metro Area:<br>636-332-6985<br><br>Toll Free: 800-325-8509</span>
          </div>
          <div class="contact-info">
            <i class="fas fa-fax contact-icon"></i>
            <span class="contact-data">Fax:<br>636-332-8046</span>
          </div>
          <div class="contact-info">
            <i class="fas fa-map-marker-alt contact-icon"></i>
            <span class="contact-data">104 Mullach Court<br>Suite 1028<br>Wentzville, MO 63385</span>
          </div>
          <div class="contact-info">
            <i class="fas fa-envelope contact-icon"></i>
            <span class="contact-data">Diane Moore<br>Email: Dmoore1246@aol.com</span>
          </div>
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
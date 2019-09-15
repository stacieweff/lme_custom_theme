<footer class="site-footer">
  <div class="footer-nav-links">
    <nav id="footer-nav" class="footer-nav">
      <?php
          $args = array(
            'theme_location' => 'footer'
          );
          ?>
          <?php wp_nav_menu( $args ); ?>
    </nav>
  </div>

  <div class="footer-company-info">
    <div class="footer-left">
      <div class="footer-logo">
        <img src="<?php site_icon_url() ?>" width="50px"/>
      </div>
      <div class="footer-info">
        <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?> All Rights Reserved.</p>
      </div>
    </div>
    <div class="footer-right">
      <?php dynamic_sidebar('facebook') ?>
    </div>
  </div>
</footer>
</div> <!--end container-->

<?php wp_footer(); ?>

</body>
</html>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width-device-width">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container">
  <header class="site-header">
    <div class="company-container">
      <div class="logo-area">
        <img src="http://localhost:8888/new_lme_company/wp-content/uploads/2018/10/lme_logo.jpg" width="125px"/>
      </div>
      <div class="company-info">
        <div class="company-name">
          <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <!-- <h5><?php bloginfo('description'); ?></h5> -->
        <div class="phone-number">(636) 332-6985</div>
        <div class="social-icons">
          <div class="facebook">F</div>
          <div class="twitter">T</div>
          <div class="instagram">I</div>
        </div>
      </div>
    </div>
    <nav id="main-nav" class="site-nav">
      <?php
      $args = array(
        'theme_location' => 'primary'
      );
      ?>

      <?php wp_nav_menu( $args ); ?>
    </nav>
  </header>

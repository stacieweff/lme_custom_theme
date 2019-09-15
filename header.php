<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width-device-width">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/xpl7mti.css">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="container">
  <header class="site-header">
    <div class="company-container">
      <div class="logo-area">
        <img src="<?php site_icon_url() ?>" width="125px"/>
      </div>
      <div class="company-info">
        <div class="company-name">
          <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <!-- <div class="phone-number"><?php bloginfo('description'); ?></div> -->
        <div class="phone-number">(636) 332-6985</div>
        <!-- <div class="social-icons">
          <div class="facebook">F</div>
          <div class="twitter">T</div>
          <div class="instagram">I</div>
        </div> -->
      </div>
    </div>
    <div class="right-header">
      <div class="main-search"><?php get_search_form(); ?></div>
      <nav id="main-nav" class="site-nav">
        <?php
        $args = array(
          'theme_location' => 'primary'
        );
        ?>

        <?php wp_nav_menu( $args ); ?>
      </nav>
    </div>
  </header>

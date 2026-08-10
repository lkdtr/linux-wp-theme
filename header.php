<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>">
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?> Atom Feed" href="<?php bloginfo( 'atom_url' ); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ); ?>/images/favicon.png">
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div id="top">
      <div class="wrapper" id="header">
        <a href="<?php bloginfo( 'siteurl' ); ?>">
          <img class="logo" src="<?php bloginfo( 'template_url' ); ?>/images/linux-logo.png?v=20250319" alt="<?php bloginfo( 'name' ); ?>">
        </a>
        <div id="banner">
          <!-- Revive Adserver iFrame Tag - Generated with Revive Adserver v5.3.1 -->
          <iframe id='af501f86' name='af501f86' src='https://reklam.lkd.org.tr/www/delivery/afr.php?zoneid=1&amp;target=_blank&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='468' height='60' allow='autoplay'><a href='https://reklam.lkd.org.tr/www/delivery/ck.php?n=afb55e20&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='https://reklam.lkd.org.tr/www/delivery/avw.php?zoneid=1&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=afb55e20' border='0' alt=''></a></iframe>
        </div>
      </div>
      <?php include 'menu.php'; ?>
    </div>
    <!-- Header part is finished -->

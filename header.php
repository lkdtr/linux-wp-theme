<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/menu.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/buttons.js"></script>

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
  </head>
  <body>
    <div id="top">
      <div class="wrapper" id="header">
        <a href="<?php bloginfo('siteurl'); ?>">
          <img class="logo" src="<?php bloginfo('template_url'); ?>/images/logo.png?v=20230615" />
        </a>
      	<!-- Revive Adserver iFrame Tag - Generated with Revive Adserver v5.3.1 -->
		<iframe id='af501f86' name='af501f86' src='https://reklam.lkd.org.tr/www/delivery/afr.php?zoneid=1&amp;target=_blank&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='468' height='60' allow='autoplay'><a href='https://reklam.lkd.org.tr/www/delivery/ck.php?n=afb55e20&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='https://reklam.lkd.org.tr/www/delivery/avw.php?zoneid=1&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=afb55e20' border='0' alt='' /></a></iframe>

      </div>
      <?php include 'menu.php'; ?>
    </div>
    <!-- Header part is finished -->

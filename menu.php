<div class="wrapper" id="horizontal_menu">
  <?php wp_nav_menu( array( 'container' => 'ul', 'theme_location' => 'menu', 'items_wrap' => '<ul id="menu-header">%3$s</ul>', 'menu_id' => 'nav')); ?>
  <?php wp_nav_menu( array( 'container' => 'ul', 'theme_location' => 'menu_en', 'items_wrap' => '<ul id="menu-header">%3$s</ul>', 'menu_id' => 'nav_en')); ?>
</div>
<div class="clear"></div>

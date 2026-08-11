<?php
/*
 * Template Name: Bağlantılar
 */
?>
<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <div id="content" class="widecolumn">

      <h1><?php esc_html_e( 'Bağlantılar:', 'linux-wp-theme' ); ?></h1>
      <ul>
        <?php wp_list_bookmarks(); ?>
      </ul>

    </div>
  </div>
  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

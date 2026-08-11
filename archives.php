<?php
/*
 * Template Name: Arşivler
 */
?>
<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <div id="content" class="widecolumn">

      <?php get_search_form(); ?>

      <h2><?php esc_html_e( 'Aylara göre arşiv:', 'linux-wp-theme' ); ?></h2>
      <ul>
        <?php wp_get_archives( 'type=monthly' ); ?>
      </ul>

      <h2><?php esc_html_e( 'Kategorilere göre Arşiv:', 'linux-wp-theme' ); ?></h2>
      <ul>
        <?php wp_list_categories(); ?>
      </ul>

    </div>
  </div>
  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

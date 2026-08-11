<?php
/*
 * Template Name: News
 *
 * exceprt($limit) fonksiyonunun çalışması için şu eklentiye ihtiyaç var:
 * http://wordpress.org/extend/plugins/content-and-excerpt-word-limit/
 */
?>

<?php get_header(); ?>

<?php

    $cur_page = max( 1, absint( get_query_var( 'page' ) ? get_query_var( 'page' ) : get_query_var( 'paged' ) ) );

    $news_query = new WP_Query( array(
        'posts_per_page' => 12,
        'paged'          => $cur_page,
    ) );

?>

<div id="page">
  <div class="wrapper">
    <?php include('news_menu.php'); ?>
    <div id="content-news">
        <ul class="content-news-top">
          <?php delete_option('wl_readmore_link'); ?>
          <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>
          <li class="top">
              <ul>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?> için kalıcı bağlantı">
                  <li class="bottom">
                      <h4><?php the_title(); ?></h4>
                      <p class="time">(<?php the_time('d F Y'); ?>)</p>
                      <div class="entry">
                          <p><?php excerpt(25); ?></p>
                      </div>
                  </li>
                  </a>
                  <li class="comments">
                      <?php comments_popup_link('Yorum Yok', '1 Yorum', '% Yorum'); ?>
                  </li>
              </ul>
          </li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
        <div id="navigation">
            <?php if ( $cur_page < $news_query->max_num_pages ) : ?>
            <p class="previous"><a href="<?php echo esc_url( get_pagenum_link( $cur_page + 1 ) ); ?>">&laquo; Önceki Sayfa</a></p>
            <?php endif; ?>
            <?php if ( $cur_page > 1 ) : ?>
            <p class="next"><a href="<?php echo esc_url( get_pagenum_link( $cur_page - 1 ) ); ?>">Sonraki Sayfa &raquo;</a></p>
            <?php endif; ?>
            <div style="clear: both">
        </div>
    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
  </div>
</div>

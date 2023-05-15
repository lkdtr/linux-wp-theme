<?php
/*
 * Template Name: News
 *
 * exceprt($limit) fonksiyonunun çalışması için şu eklentiye ihtiyaç var:
 * http://wordpress.org/extend/plugins/content-and-excerpt-word-limit/
 */
?>

<?php

    function curPageURL() {
       $pageURL = 'http';
       if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

       $pageURL .= "://";

       if ($_SERVER["SERVER_PORT"] != "80") {
           $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
       } else {
           $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
       }

       return $pageURL;
    }

?>

<?php get_header(); ?>

<?php

    $splitted_url = explode('/', curPageURL());
    if ($splitted_url[4] == 'page') {
        $cur_page = absint($splitted_url[5]);
    } else {
        $cur_page = 1;
    }

    $offset = ($cur_page - 1) * 12;
    $previous = $cur_page - 1;
    $next = $cur_page + 1;

    query_posts(array('showposts' => '12', 'paged' => $cur_page));

?>

<div id="page">
  <div class="wrapper">
    <?php include('news_menu.php'); ?>
    <div id="content-news">
        <ul class="content-news-top">
          <?php delete_option('wl_readmore_link'); ?>
          <?php while (have_posts()) : the_post(); ?>
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
          <?php endwhile; ?>
        </ul>
        <div id="navigation">
            <p class="previous"><?php next_posts_link('&laquo; Önceki Sayfa') ?></p>
            <p class="next"><?php previous_posts_link('Sonraki Sayfa &raquo;') ?></p>
            <div style="clear: both">
        </div>
    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
  </div>
</div>

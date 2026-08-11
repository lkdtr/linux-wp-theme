<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <?php include('news_menu.php'); ?>
    <div id="content" style="min-height: 470px">

      <?php if (have_posts()) : ?>

        <h2 class="pagetitle">Arama Sonuçları</h2>

        <div id="navigation">
          <p class="previous"><?php next_posts_link('&laquo; Eski Yazılar') ?></p>
          <p class="next"><?php previous_posts_link('Yeni Yazılar &raquo;') ?></p>
        </div>

        <?php while (have_posts()) : the_post(); ?>

          <div <?php post_class() ?>>
            <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?> için Kalıcı Bağlantı"><?php the_title(); ?></a></h3>
            <p class="time"><?php the_time('l, j F Y') ?></p>

            <p class="postmetadata"><?php the_tags('Etiketler: ', ', ', '<br />'); ?> Kategori: <?php the_category(', ') ?> | <?php edit_post_link('Düzenle', '', ' | '); ?>  <?php comments_popup_link('Yorum Yok &#187;', '1 Yorum &#187;', '% Yorum &#187;'); ?></p>
          </div>

        <?php endwhile; ?>

        <div id="navigation">
          <p class="previous"><?php next_posts_link('&laquo; Eski Yazılar') ?></p>
          <p class="next"><?php previous_posts_link('Yeni Yazılar &raquo;') ?></p>
        </div>

      <?php else : ?>

        <h2 class="pagetitle">Aradığınız ifadeyi içeren hiç yazı bulunamadı.</h2>
        <?php get_search_form(); ?>

      <?php endif; ?>

    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

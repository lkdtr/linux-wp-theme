<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <?php include('news_menu.php'); ?>
    <div id="content" style="min-height: 470px">

      <?php if (have_posts()) : ?>

        <h2 class="pagetitle"><?php esc_html_e( 'Arama Sonuçları', 'linux-wp-theme' ); ?></h2>

        <div id="navigation">
          <p class="previous"><?php next_posts_link( __( '&laquo; Eski Yazılar', 'linux-wp-theme' ) ) ?></p>
          <p class="next"><?php previous_posts_link( __( 'Yeni Yazılar &raquo;', 'linux-wp-theme' ) ) ?></p>
        </div>

        <?php while (have_posts()) : the_post(); ?>

          <div <?php post_class() ?>>
            <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( '%s için Kalıcı Bağlantı', 'linux-wp-theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a></h3>
            <p class="time"><?php the_time('l, j F Y') ?></p>

            <p class="postmetadata"><?php the_tags( __( 'Etiketler: ', 'linux-wp-theme' ), ', ', '<br />'); ?> <?php esc_html_e( 'Kategori:', 'linux-wp-theme' ); ?> <?php the_category(', ') ?> | <?php edit_post_link( __( 'Düzenle', 'linux-wp-theme' ), '', ' | '); ?>  <?php comments_popup_link( __( 'Yorum Yok &#187;', 'linux-wp-theme' ), __( '1 Yorum &#187;', 'linux-wp-theme' ), __( '% Yorum &#187;', 'linux-wp-theme' ) ); ?></p>
          </div>

        <?php endwhile; ?>

        <div id="navigation">
          <p class="previous"><?php next_posts_link( __( '&laquo; Eski Yazılar', 'linux-wp-theme' ) ) ?></p>
          <p class="next"><?php previous_posts_link( __( 'Yeni Yazılar &raquo;', 'linux-wp-theme' ) ) ?></p>
        </div>

      <?php else : ?>

        <h2 class="pagetitle"><?php esc_html_e( 'Aradığınız ifadeyi içeren hiç yazı bulunamadı.', 'linux-wp-theme' ); ?></h2>
        <?php get_search_form(); ?>

      <?php endif; ?>

    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

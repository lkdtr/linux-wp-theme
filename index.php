<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
      <div id="with-sidebar">
        <div id="buttons">
          <a href="<?php bloginfo('siteurl'); ?>/linux-nedir"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-1.jpg" alt="<?php esc_attr_e( 'Linux Nedir?', 'linux-wp-theme' ); ?>" /></a>
          <a href="<?php bloginfo('siteurl'); ?>/dagitimlar-kilavuzu"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-2.jpg" alt="<?php esc_attr_e( 'Dağıtımlar Kılavuzu', 'linux-wp-theme' ); ?>"/></a>
          <a href="<?php bloginfo('siteurl'); ?>/yardim"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-3.jpg" alt="<?php esc_attr_e( 'Yardım', 'linux-wp-theme' ); ?>" /></a>
        </div>

        <div id="what-is-linux">
          <h1><?php esc_html_e( 'Linux Nedir?', 'linux-wp-theme' ); ?></h1>
          <p><?php esc_html_e( 'Linux, Internet üzerinden haberleşen çok sayıda gönüllü programcının desteğiyle Linus Torvalds tarafından baştan başlanarak geliştirilmiş GNU/Linux işletim sisteminin çekirdeğidir.', 'linux-wp-theme' ); ?></p>

          <h2><?php esc_html_e( 'Özgür Yazılım Nedir?', 'linux-wp-theme' ); ?></h2>
          <p>
            <?php esc_html_e( 'Yazılım ürünlerinin kişi, kurum ve kuruluşlardan bağımsız olarak geliştirilmesi, kullanılması, dağıtılması ve paylaşılması anlayışı özgür yazılım olarak bilinmektedir.', 'linux-wp-theme' ); ?>
            <a href="/linux-nedir"><?php esc_html_e( 'Daha fazla bilgi…', 'linux-wp-theme' ); ?></a>
          </p>

          <h2><?php esc_html_e( 'Nereden Linux Bulabilirim?', 'linux-wp-theme' ); ?></h2>
          <p><?php esc_html_e( 'Linux, diğer birçok özgür yazılım ürünü gibi ücretsiz olarak edinilebilmektedir. Çeşitli Linux dağıtımlarının yansılarını Dosya Alanı bölümünü oluşturan FTP sunucumuzda bulabilirsiniz. LKD’nin katıldığı çeşitli fuarlarda, standımızda Linux CD’leri bulabilirsiniz. Bunun yanı sıra CD satan yerlere de başvurabilirsiniz.', 'linux-wp-theme' ); ?></p>
        </div>
      </div> <!-- end with-sidebar -->
    <div id="content">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h2>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( '%s için kalıcı bağlantı', 'linux-wp-theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a>
              <p class="date"><?php the_time('d F Y'); ?></p>
            </h2>
            <div class="entry">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink() ?>" class="entry-thumb" rel="bookmark" aria-hidden="true">
                  <?php the_post_thumbnail( 'linux-entry-thumb' ); ?>
                </a>
              <?php endif; ?>
              <?php if ( get_option( 'rss_use_excerpt' ) ) : ?>
                <?php the_excerpt(); ?>
              <?php else : ?>
                <?php the_content( __( 'Yazının kalanını okuyun &raquo;', 'linux-wp-theme' ) ); ?>
              <?php endif; ?>
            </div>
          </div>
          <div style="clear: both"></div>
          <?php if ( $wp_query->current_post + 1 < $wp_query->post_count ) : ?>
            <hr class="post-separator">
          <?php endif; ?>
        <?php endwhile; ?>
      <?php else : ?>
        <h2><?php esc_html_e( 'Bulunamadı', 'linux-wp-theme' ); ?></h2>
        <p><?php esc_html_e( 'Üzgünüz, aradığınız şey burada değil.', 'linux-wp-theme' ); ?></p>
      <?php endif; ?>
    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

<!-- Finito -->

<?php
  ini_set('error_reporting', E_ALL);
  get_header();
?>

<div id="page">
  <div class="wrapper">
      <div id="with-sidebar">
        <div id="buttons">
          <a href="<?php bloginfo('siteurl'); ?>/linux-nedir"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-1.jpg" alt="Linux Nedir?" /></a>
          <a href="<?php bloginfo('siteurl'); ?>/dagitimlar-kilavuzu"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-2.jpg" alt="Dağıtımlar Kılavuzu"/></a>
          <a href="<?php bloginfo('siteurl'); ?>/yardim"><img class="button" src="<?php bloginfo('template_url'); ?>/images/button-3.jpg" alt="Yardım" /></a>
        </div>

        <div id="what-is-linux">
          <h4>Linux Nedir?</h4>
          <p>Linux, Internet üzerinden haberleşen çok sayıda gönüllü programcının desteğiyle Linus Torvalds tarafından baştan başlanarak geliştirilmiş GNU/Linux işletim sisteminin çekirdeğidir.</p>

          <h4>Özgür Yazılım Nedir?</h4>
          <p>Yazılım ürünlerinin kişi, kurum ve kuruluşlardan bağımsız olarak geliştirilmesi, kullanılması, dağıtılması ve paylaşılması anlayışı özgür yazılım olarak bilinmektedir. <a href="/linux-nedir">Daha fazla bilgi…</a></p>

          <h4>Nereden Linux Bulabilirim?</h4>
          <p>Linux, diğer birçok özgür yazılım ürünü gibi ücretsiz olarak edinilebilmektedir. Çeşitli Linux dağıtımlarının yansılarını Dosya Alanı bölümünü oluşturan FTP sunucumuzda bulabilirsiniz. LKD’nin katıldığı çeşitli fuarlarda, standımızda Linux CD’leri bulabilirsiniz. Bunun yanı sıra CD satan yerlere de başvurabilirsiniz.</p>
        </div>
      </div> <!-- end with-sidebar -->
    <div id="content">
      <?php if (have_posts()) : ?>
        <?php query_posts('showposts=1'); ?>
        <?php while (have_posts()) : the_post(); ?>
          <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h2>
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?> için kalıcı bağlantı"><?php the_title(); ?></a>
              <p class="date"><?php the_time('d F Y'); ?></p>
            </h2>
            <div class="entry">
              <?php the_content('Yazının kalanını okuyun &raquo;'); ?>
            </div>
          </div>
          <div style="clear: both"></div>
        <?php endwhile; ?>
      <?php else: ?>
        <h2>Bulunamadı</h2>
        <p>Üzgünüz, aradığınız şey burada değil.</p>
      <?php endif; ?>

      <?php // include 'news_inc.php'; ?>
    </div> <!-- end content -->
  </div> <!-- end wrapper -->

  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

<!-- Finito -->
</body></html>

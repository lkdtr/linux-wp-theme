<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
  <div id="content"
    style="height: 470px; background: #FFF url('<?php bloginfo('template_url'); ?>/images/warning.jpg') bottom right no-repeat">
    <p class="warning">
      <?php esc_html_e( 'Üzgünüz, aradığınız sayfa bulunamadı!', 'linux-wp-theme' ); ?><br /><br />
      <?php esc_html_e( 'Lütfen girdiğiniz bağlantı adresini kontrol edin veya aşağıda yer alan arama bölümünden arama yapınız.', 'linux-wp-theme' ); ?>
    </p>
  </div>
  </div>
  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>
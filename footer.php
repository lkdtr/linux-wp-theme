<div class="wrapper" id="footer">
  <p class="left">
    <a href='https://www.mozilla.org/firefox/'><img src='<?php bloginfo( 'template_url' ); ?>/images/download-firefox.png' alt='Daha İyi Bir Web Deneyimi İçin Firefox Kullanın'></a>
    <a href='https://www.wordpress.org/'><img src='<?php bloginfo( 'template_url' ); ?>/images/wp-logo.png' alt='Site Alt Yapısı Olarak WordPress Kullanılmaktadır.'></a>
  </p>
  <span><a href="<?php bloginfo( 'siteurl' ); ?>/gpl">GPL</a></span>
  <?php
    if ( function_exists( 'quotescollection_quote' ) ) :
      $quote_array = quotescollection_get_randomquote();
      $quote = stripslashes( $quote_array['quote'] );
      echo '<span><i>' . esc_html( $quote ) . '</i></span>';
    endif;
  ?>
</div>

<?php wp_footer(); ?>
</body>
</html>

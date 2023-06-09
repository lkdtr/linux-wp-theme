<div class="wrapper" id="footer">
  <p class="left">
    <a href='http://www.mozilla.org/firefox?WT.mc_id=aff_en06&WT.mc_ev=click'><img src='https://www.linux.org.tr/wp-content/themes/linux-wp-theme/images/download-firefox.png' alt='Daha İyi Bir Web Deneyimi İçin Firefox Kullanın' border='0' /></a>
    <a href='http://www.wordpress.org/'><img src='https://www.linux.org.tr/wp-content/themes/linux-wp-theme/images/wp-logo.png' alt='Site Alt Yapısı Olarak Wordpress Kullanılmaktadır.' border='0' /></a>
  </p>
  <span><a href="<?php bloginfo('siteurl'); ?>/gpl">GPL</a></span>
  <?php
    if (function_exists('quotescollection_quote')):
      $quote_array = quotescollection_get_randomquote();
      $quote = stripslashes($quote_array['quote']);
      print('<span><i>'. $quote .'</i></span>');
    endif;
  ?>
</div>

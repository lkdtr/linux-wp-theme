<div id="content-news-header">
  <select name="archive-dropdown" style="float: right; margin: 5px 10px;"
    onChange='document.location.href=this.options[this.selectedIndex].value;'>
    <option value="">
      <?php esc_html_e( 'Haber Arşivi', 'linux-wp-theme' ); ?>
    </option>
    <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
  </select>
  <h2 class="content-news"><?php esc_html_e( 'Haberler', 'linux-wp-theme' ); ?></h2>
  <p>
    <a href="/yeni-haber-girisi"><?php esc_html_e( 'Yeni Haber Gir', 'linux-wp-theme' ); ?></a>
    <a href="/haberler"><?php esc_html_e( 'Tüm Haberleri Gör', 'linux-wp-theme' ); ?></a>
  </p>
</div>

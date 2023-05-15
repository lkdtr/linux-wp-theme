<div id="content-news-header">
  <select name="archive-dropdown" style="float: right; margin: 5px 10px;"
    onChange='document.location.href=this.options[this.selectedIndex].value;'>
    <option value="">
      <?php echo attribute_escape('Haber Arşivi'); ?>
    </option>
    <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?>
  </select>
  <h2 class="content-news">Haberler</h2>
  <p>
    <a href="/haberler/yeni-haber-girisi">Yeni Haber Gir</a>
    <a href="/haberler">Tüm Haberleri Gör</a>
  </p>
</div>

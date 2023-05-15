<?php

    setlocale(LC_ALL, "tr_TR.UTF-8");
    include('simplepie.class.php');

    $gfeed = new SimplePie();
    $gfeed->set_feed_url('feed://gezegen.linux.org.tr/rss20.xml');
    $gfeed->set_cache_location(TEMPLATEPATH.'/cache');
    $gfeed->set_cache_duration(600);
    $gfeed->init();
    $gfeed->strip_attributes();
    $gfeed->strip_comments();
    $gfeed->strip_htmltags();
    $gfeed->handle_content_type();

?>

<div id="other-news">
  <div id="right-news">
  <?php $items = $gfeed->get_items(0, 2); ?>
  <h2>Linux Gezegeni</h2>
  <ul class="news">
    <?php foreach($items as $item): ?>
      <li class="other_new">
        <a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a>
        <p style="font-size: 9px; margin: 0;">(<?php echo $item->get_local_date('%e %B %Y'); ?>)</p>
      </li>
    <?php endforeach; ?>
  </ul>
  <p style="padding-bottom: 10px; font-size: 10px; font-style: italic; list-style-type: none;">(Tüm gezegen yazılarını görmek için <a href="http://gezegen.linux.org.tr/">tıklayın.</a>)</p>
  </div>

  <?php if (have_posts()) : ?>
    <h2>Diğer Haber Başlıkları</h2>
    <?php query_posts('showposts=2&offset=1'); ?>
    <ul class="news">
      <?php while (have_posts()) : the_post(); ?>
        <li class="other_new">
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?> için kalıcı bağlantı"><?php the_title(); ?></a>
          <p style="font-size: 9px; margin: 0;">(<?php the_time('d F Y'); ?>)</p>
        </li>
      <?php endwhile; ?>
    </ul>
    <p style="padding-bottom: 10px; font-size: 10px; font-style: italic; list-style-type: none;">(Tüm haberleri görmek için <a href="/haberler">tıklayın.</a>)</p>
  <?php endif; ?>
</div>
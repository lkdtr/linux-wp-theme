<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title><?php echo get_option('blogname'); ?> - <?php the_title(); ?> için yapılan yorumlar</title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body id="commentspopup">

<h1 id="header"><a href="" title="<?php echo get_option('blogname'); ?>"><?php echo get_option('blogname'); ?></a></h1>

<?php
/* Bu satırları silmeyin. */
add_filter('comment_text', 'popuplinks');
if ( have_posts() ) :
while ( have_posts() ) : the_post();
?>
<h2 id="comments">Yorumlar</h2>

<p><a href="<?php echo get_post_comments_feed_link($post->ID); ?>">>Bu yazıya yapılan yorumlar için <abbr title="Really Simple Syndication">RSS</abbr> beslemesi.</a></p>

<?php if ('open' == $post->ping_status) { ?>
<p>Bu yazıya geri izleme yapmak için <abbr title="Universal Resource Locator">URL</abbr> adresi: <em><?php trackback_url() ?></em></p>
<?php } ?>

<?php
// Bu yazı WordPress için gerekli, dokunmayın.
$commenter = wp_get_current_commenter();
extract($commenter);
$comments = get_approved_comments($id);
$post = get_post($id);
if ( post_password_required($post) ) {  // ve çerez ile eşleşmiyor
	echo(get_the_password_form());
} else { ?>

<?php if ($comments) { ?>
<ol id="commentlist">
<?php foreach ($comments as $comment) { ?>
	<li id="comment-<?php comment_ID() ?>">
	<?php comment_text() ?>
	<p><cite><?php comment_type('Yorum', 'Geri izleme', 'Pingback'); ?> <?php comment_author_link() ?> &#8212; tarafından <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite></p>
	</li>

<?php } // her yorum için ?>
</ol>
<?php } else { // hiç yorum yapılmamışsa bu gösterilecek ?>
	<p>Henüz yorum yapılmamış.</p>
<?php } ?>

<?php if ('open' == $post->comment_status) { ?>
<h2>Yorum Yapın</h2>
<p>E-posta adresi yayımlanmaz, izin verilen <acronym title="Hypertext Markup Language">HTML</acronym> kodları: <code><?php echo allowed_tags(); ?></code></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<p><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> olarak giriş yapılmış. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Bu hesaptan çıkış yap">Çıkış &raquo;</a></p>
<?php else : ?>
	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	   <label for="author">İsim</label>
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
	   <label for="email">E-posta</label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
	   <label for="url"><abbr title="Universal Resource Locator">URL</abbr></label>
	</p>
<?php endif; ?>

	<p>
	  <label for="comment">Yorumunuz</label>
	<br />
	  <textarea name="comment" id="comment" cols="70" rows="4" tabindex="4"></textarea>
	</p>

	<p>
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	  <input type="hidden" name="redirect_to" value="<?php echo attribute_escape($_SERVER["REQUEST_URI"]); ?>" />
	  <input name="submit" type="submit" tabindex="5" value="Say It!" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // yorum yapma kapalı ?>
<p>Üzgünüz, yorum formu şu an için kapalı.</p>
<?php }
} // parola kontrolü sonu
?>

<div><strong><a href="javascript:window.close()">Bu pencereyi kapat.</a></strong></div>

<?php // Eğer bunu silerseniz gökyüzü başınıza düşecektir!
endwhile; //endwhile have_posts()
else: //have_posts()
?>
<p>Üzgünüz, kriterinizle eşleşen yazı yok.</p>
<?php endif; ?>
<!-- // Bu satır da WordPress işleyişinin parçası, buna da dokunmayın elbette :) -->
<?php //} ?>
<p class="credit"><?php timer_stop(1); ?> <cite>Altyapı, <a href="http://wordpress.org/" title="WordPress'in desteğiyle, kişisel yayımlama platformu"><strong>WordPress</strong></a> - <a href="http://www.wordpress-tr.com/" title="WordPress Türkiye"><strong>TR</strong></a></cite></p>
<?php // Seen at http://www.mijnkopthee.nl/log2/archive/2003/05/28/esc(18) ?>
<script type="text/javascript">
<!--
document.onkeypress = function esc(e) {
	if(typeof(e) == "undefined") { e=event; }
	if (e.keyCode == 27) { self.close(); }
}
// -->
</script>
</body>
</html>

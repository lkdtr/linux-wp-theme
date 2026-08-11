<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title><?php echo esc_html( get_option('blogname') ); ?> - <?php the_title(); ?> <?php esc_html_e( 'için yapılan yorumlar', 'linux-wp-theme' ); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body id="commentspopup">

<h1 id="header"><a href="" title="<?php echo esc_attr( get_option('blogname') ); ?>"><?php echo esc_html( get_option('blogname') ); ?></a></h1>

<?php
/* Bu satırları silmeyin. */
add_filter('comment_text', 'popuplinks');
if ( have_posts() ) :
while ( have_posts() ) : the_post();
?>
<h2 id="comments"><?php esc_html_e( 'Yorumlar', 'linux-wp-theme' ); ?></h2>

<p><a href="<?php echo esc_url( get_post_comments_feed_link($post->ID) ); ?>">
  <?php esc_html_e( 'Bu yazıya yapılan yorumlar için', 'linux-wp-theme' ); ?> <abbr title="Really Simple Syndication">RSS</abbr> <?php esc_html_e( 'beslemesi.', 'linux-wp-theme' ); ?>
</a></p>

<?php if ('open' == $post->ping_status) { ?>
<p>
  <?php esc_html_e( 'Bu yazıya geri izleme yapmak için', 'linux-wp-theme' ); ?> <abbr title="Universal Resource Locator">URL</abbr> <?php esc_html_e( 'adresi:', 'linux-wp-theme' ); ?> <em><?php trackback_url() ?></em>
</p>
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
	<p><cite><?php comment_type( __( 'Yorum', 'linux-wp-theme' ), __( 'Geri izleme', 'linux-wp-theme' ), __( 'Pingback', 'linux-wp-theme' ) ); ?> <?php comment_author_link() ?> &#8212; <?php esc_html_e( 'tarafından', 'linux-wp-theme' ); ?> <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite></p>
	</li>

<?php } // her yorum için ?>
</ol>
<?php } else { // hiç yorum yapılmamışsa bu gösterilecek ?>
	<p><?php esc_html_e( 'Henüz yorum yapılmamış.', 'linux-wp-theme' ); ?></p>
<?php } ?>

<?php if ('open' == $post->comment_status) { ?>
<h2><?php esc_html_e( 'Yorum Yapın', 'linux-wp-theme' ); ?></h2>
<p><?php esc_html_e( 'E-posta adresi yayımlanmaz, izin verilen', 'linux-wp-theme' ); ?> <acronym title="Hypertext Markup Language">HTML</acronym> <?php esc_html_e( 'kodları:', 'linux-wp-theme' ); ?> <code><?php echo esc_html( allowed_tags() ); ?></code></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<p>
	  <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo esc_html( $user_identity ); ?></a>
	  <?php esc_html_e( 'olarak giriş yapılmış.', 'linux-wp-theme' ); ?>
	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e( 'Bu hesaptan çıkış yap', 'linux-wp-theme' ); ?>"><?php echo __( 'Çıkış &raquo;', 'linux-wp-theme' ); ?></a>
	</p>
<?php else : ?>
	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo esc_attr( $comment_author ); ?>" size="28" tabindex="1" />
	   <label for="author"><?php esc_html_e( 'İsim', 'linux-wp-theme' ); ?></label>
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo esc_attr( $comment_author_email ); ?>" size="28" tabindex="2" />
	   <label for="email"><?php esc_html_e( 'E-posta', 'linux-wp-theme' ); ?></label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo esc_attr( $comment_author_url ); ?>" size="28" tabindex="3" />
	   <label for="url"><abbr title="Universal Resource Locator">URL</abbr></label>
	</p>
<?php endif; ?>

	<p>
	  <label for="comment"><?php esc_html_e( 'Yorumunuz', 'linux-wp-theme' ); ?></label>
	<br />
	  <textarea name="comment" id="comment" cols="70" rows="4" tabindex="4"></textarea>
	</p>

	<p>
      <input type="hidden" name="comment_post_ID" value="<?php echo esc_attr( $id ); ?>" />
	  <input type="hidden" name="redirect_to" value="<?php echo esc_url( wp_unslash( $_SERVER['REQUEST_URI'] ) ); ?>" />
	  <input name="submit" type="submit" tabindex="5" value="<?php esc_attr_e( 'Say It!', 'linux-wp-theme' ); ?>" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // yorum yapma kapalı ?>
<p><?php esc_html_e( 'Üzgünüz, yorum formu şu an için kapalı.', 'linux-wp-theme' ); ?></p>
<?php }
} // parola kontrolü sonu
?>

<div><strong><a href="javascript:window.close()"><?php esc_html_e( 'Bu pencereyi kapat.', 'linux-wp-theme' ); ?></a></strong></div>

<?php // Eğer bunu silerseniz gökyüzü başınıza düşecektir!
endwhile; //endwhile have_posts()
else: //have_posts()
?>
<p><?php esc_html_e( 'Üzgünüz, kriterinizle eşleşen yazı yok.', 'linux-wp-theme' ); ?></p>
<?php endif; ?>
<!-- // Bu satır da WordPress işleyişinin parçası, buna da dokunmayın elbette :) -->
<?php //} ?>
<p class="credit"><?php timer_stop(1); ?> <cite><?php esc_html_e( 'Altyapı,', 'linux-wp-theme' ); ?> <a href="http://wordpress.org/" title="<?php esc_attr_e( "WordPress'in desteğiyle, kişisel yayımlama platformu", 'linux-wp-theme' ); ?>"><strong>WordPress</strong></a> - <a href="http://www.wordpress-tr.com/" title="<?php esc_attr_e( 'WordPress Türkiye', 'linux-wp-theme' ); ?>"><strong>TR</strong></a></cite></p>
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

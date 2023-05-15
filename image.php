<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // "başlık" ?></div>

				<?php the_content('<p class="serif">Yazının tamamını okuyun &raquo;</p>'); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

				<p class="postmetadata alt">
					<small>
						Bu girdi <?php the_time('l, d F Y') ?>, <?php the_time() ?> tarihinde
						<?php the_category(', ') ?> kategorisi altında yayınlandı.
						<?php the_taxonomies(); ?>
						Bu girdiye yapılacak yorumlardan haberdar olmak için <?php post_comments_feed_link('RSS 2.0'); ?> beslemesini kullanabilirsiniz.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Yorumlar ve geri izlemeler açık ?>
              <a href="#respond">Yorum yapabilirsiniz</a>, veya kendi sitenizden <a href="<?php trackback_url(); ?>" rel="trackback">geri izleme</a> yapabilirsiniz.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Sadece geri izlemeler açık ?>
							Yorum yapma şimdilik kapalı, fakat kendi sitenizden <a href="<?php trackback_url(); ?> " rel="trackback">geri izleme</a> yapabilirsiniz.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Yorum yapma açık, ping kapalı ?>
							Sona gidip yorum yapabilirsiniz. Pingleme şimdilik kapalı.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Ne yorum yapma ne de pingleme açık ?>
							Yorum yapma ve pingleme kapalı.

						<?php } edit_post_link('Girdiyi düzenleyin','','.'); ?>

					</small>
				</p>

			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Üzgünüz, kriterlerinizle eşleşen ek bulunamadı.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>

<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <?php the_title(); ?></h2>
			<div class="entry">
				<p class="attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></p>
				<div class="caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // "başlık" ?></div>

				<?php the_content( __( '<p class="serif">Yazının tamamını okuyun &raquo;</p>', 'linux-wp-theme' ) ); ?>

				<div class="navigation">
					<div class="alignleft"><?php previous_image_link() ?></div>
					<div class="alignright"><?php next_image_link() ?></div>
				</div>
				<br class="clear" />

				<p class="postmetadata alt">
					<small>
						<?php
							/* translators: 1: yayın tarihi, 2: yayın saati */
							printf(
								esc_html__( 'Bu girdi %1$s, %2$s tarihinde', 'linux-wp-theme' ),
								esc_html( get_the_time( 'l, d F Y' ) ),
								esc_html( get_the_time() )
							);
						?>
						<?php the_category(', ') ?> <?php esc_html_e( 'kategorisi altında yayınlandı.', 'linux-wp-theme' ); ?>
						<?php the_taxonomies(); ?>
						<?php esc_html_e( 'Bu girdiye yapılacak yorumlardan haberdar olmak için', 'linux-wp-theme' ); ?> <?php post_comments_feed_link( __( 'RSS 2.0', 'linux-wp-theme' ) ); ?> <?php esc_html_e( 'beslemesini kullanabilirsiniz.', 'linux-wp-theme' ); ?>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Yorumlar ve geri izlemeler açık ?>
              <a href="#respond"><?php esc_html_e( 'Yorum yapabilirsiniz', 'linux-wp-theme' ); ?></a>, <?php esc_html_e( 'veya kendi sitenizden', 'linux-wp-theme' ); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php esc_html_e( 'geri izleme', 'linux-wp-theme' ); ?></a> <?php esc_html_e( 'yapabilirsiniz.', 'linux-wp-theme' ); ?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Sadece geri izlemeler açık ?>
							<?php esc_html_e( 'Yorum yapma şimdilik kapalı, fakat kendi sitenizden', 'linux-wp-theme' ); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php esc_html_e( 'geri izleme', 'linux-wp-theme' ); ?></a> <?php esc_html_e( 'yapabilirsiniz.', 'linux-wp-theme' ); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Yorum yapma açık, ping kapalı ?>
							<?php esc_html_e( 'Sona gidip yorum yapabilirsiniz. Pingleme şimdilik kapalı.', 'linux-wp-theme' ); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Ne yorum yapma ne de pingleme açık ?>
							<?php esc_html_e( 'Yorum yapma ve pingleme kapalı.', 'linux-wp-theme' ); ?>

						<?php } edit_post_link( __( 'Girdiyi düzenleyin', 'linux-wp-theme' ), '', '.' ); ?>

					</small>
				</p>

			</div>

		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php esc_html_e( 'Üzgünüz, kriterlerinizle eşleşen ek bulunamadı.', 'linux-wp-theme' ); ?></p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>

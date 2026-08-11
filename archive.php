<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <?php include('news_menu.php'); ?>
    <div id="content" style="min-height: 470px">
      <?php if (have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. $post değişkenini ata ki the_date() çalışsın. ?>
     	  <?php /* Kategori arşivi ise */ if (is_category()) { ?>
    		<h2 class="pagetitle">&#8216;<?php single_cat_title(); ?>&#8217; <?php esc_html_e( 'kategorisi için Arşiv', 'linux-wp-theme' ); ?></h2>
     	  <?php /* Etiket arşivi ise */ } elseif( is_tag() ) { ?>
    		<h2 class="pagetitle">&#8216;<?php single_tag_title(); ?>&#8217; <?php esc_html_e( 'olarak etiketlenmiş yazılar', 'linux-wp-theme' ); ?></h2>
     	  <?php /* Günlük arşiv ise */ } elseif (is_day()) { ?>
    		<h2 class="pagetitle"><?php the_time('d F Y'); ?> <?php esc_html_e( 'için Arşiv', 'linux-wp-theme' ); ?></h2>
     	  <?php /* Aylık arşiv ise */ } elseif (is_month()) { ?>
    		<h2 class="pagetitle"><?php the_time('F Y'); ?> <?php esc_html_e( 'için Arşiv', 'linux-wp-theme' ); ?></h2>
     	  <?php /* Yıllık arşiv ise */ } elseif (is_year()) { ?>
    		<h2 class="pagetitle"><?php the_time('Y'); ?> <?php esc_html_e( 'için Arşiv', 'linux-wp-theme' ); ?></h2>
    	  <?php /* Yazar arşivi ise */ } elseif (is_author()) { ?>
    		<h2 class="pagetitle"><?php esc_html_e( 'Yazar Arşivi', 'linux-wp-theme' ); ?></h2>
     	  <?php /* Sayfalanmış bir arşiv ise */ } elseif ( is_paged() ) { ?>
    		<h2 class="pagetitle"><?php esc_html_e( 'Blog Arşivi', 'linux-wp-theme' ); ?></h2>
     	  <?php } ?>

     	  <?php while (have_posts()) : the_post(); ?>
      		<div <?php post_class() ?>>
      				<h3 id="post-<?php the_ID(); ?>" style="margin-bottom: 0"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( '%s için kalıcı bağlantı', 'linux-wp-theme' ), get_the_title() ) ); ?>"><?php the_title(); ?></a></h3>
              <p class="time">(<?php the_time('d F Y'); ?>)</p>

      				<div class="entry">
      					<?php the_content() ?>
      				</div>

              <p class="postmetadata"><?php edit_post_link( __( 'Düzenle', 'linux-wp-theme' ), '', ' | '); ?>  <?php comments_popup_link( __( 'Yorum Yok &#187;', 'linux-wp-theme' ), __( '1 Yorum &#187;', 'linux-wp-theme' ), __( '% Yorum &#187;', 'linux-wp-theme' ) ); ?></p>

      			</div>
      <?php endwhile; ?>

    	<?php else :

    		if ( is_category() ) { // Kategori arşivi ise
    			/* translators: %s: kategori adı */
    			printf( "<h2 class='center'>" . esc_html__( 'Üzgünüz, %s kategorisinde henüz yazı yok.', 'linux-wp-theme' ) . "</h2>", esc_html( single_cat_title('',false) ) );
    		} else if ( is_date() ) { // Tarih arşivi ise
    			echo '<h2>' . esc_html__( 'Üzgünüz, bu tarihte yazı yok.', 'linux-wp-theme' ) . '</h2>';
    		} else if ( is_author() ) { // Yazar arşivi ise
    			$userdata = get_user_by('login', get_query_var('author_name'));
    			/* translators: %s: yazar adı */
    			printf( "<h2 class='center'>" . esc_html__( 'Üzgünüz, henüz %s tarafından yazılmış herhangi bir yazı yok.', 'linux-wp-theme' ) . "</h2>", esc_html( $userdata->display_name ) );
    		} else {
    			echo '<h2 class="center">' . esc_html__( 'Herhangi bir yazı bulunamadı.', 'linux-wp-theme' ) . '</h2>';
    		}
    		get_search_form();

    	endif;
    ?>

      <div style="clear: both"></div>
      <?php comments_template( '', true ); ?>
    </div>
  </div>
  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>

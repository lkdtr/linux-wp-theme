	<div id="sag">
			<?php 	/* Eğer eklentiler yüklüyse bu yan sütun bileşen uyumlu çalışır. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

			<!-- Yazar bilgileri öntanımlı olarak kapalıdır. Kullanmak isterseniz yazar bilgilerini doldurduktan sonra bu alanı açabilirsiniz.
			<li><h2>Yazar</h2>
			<p>Kendiniz hakkında bir kaç şey. Çok uzun değil, kısa bir özet.</p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?><div class="blok">
            <h1>Bilgi</h1>
			<?php /* Eğer bir 404 sayfası ise */ if (is_404()) { ?>
			<?php /* Eğer bir kategori arşivi ise */ } elseif (is_category()) { ?>
			<p>Şu an <?php single_cat_title(''); ?> kategorisi için arşive bakıyorsunuz.</p>
			
			<?php /* Eğer günlük bir arşiv ise */ } elseif (is_day()) { ?>
			<p>Şu an <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog arşivine bakıyorsunuz,
			<?php the_time('l, d F Y'); ?> günü için.</p>
			
			<?php /* Eğer aylık bir arşiv ise */ } elseif (is_month()) { ?>
			<p>Şu an <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog arşivine bakıyorsunuz,
			<?php the_time('F, Y'); ?> için.</p>

      <?php /* Eğer yıllık bir arşiv ise */ } elseif (is_year()) { ?>
			<p>Şu an <a href="<?php bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog arşivine bakıyorsunuz,
			<?php the_time('Y'); ?> yılı için.</p>
			
		 <?php /* Eğer bir arama arşivi ise */ } elseif (is_search()) { ?>
            <p><a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog arşivini aradınız,
			<strong>'<?php the_search_query(); ?>'</strong> için. Eğer istediğinizi bulamadıysanız, şu bağlantılardan birini deneyebilirsiniz.</p>

			<?php /* Yukardakiler değilse */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>Şu an <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> blog arşivine bakıyorsunuz.</p>

			<?php } ?>
            
            </div><?php }?>
<div class="blok">
			<?php wp_list_pages('title_li=<h1>LKD</h1>' ); ?>
</div>
<!--			<div class="blok">
            <h1>Arşiv</h1>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
            </div>-->
<?php { /* ?>
<div class="blok">
			<?php //wp_list_categories('show_count=1&title_li=<h1>Kategoriler</h1>'); ?>
            </div>
<?php */}?>
			<?php /* Eğer ön sayfaysa */ /* if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>				
				
                <div class="blok">
				<h1>Meta</h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="Bu sayfa XHTML 1.0 Transitional olarak geçerlidir">Geçerli <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Altyapı WordPress, kişisel yayımlama platformu.">WordPress</a></li>
					<?php// wp_meta(); ?>
				</ul>
				</li>
                </div>
            <?php }*/ ?>

			<?php endif; ?>
	</div>

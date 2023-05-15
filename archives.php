<?php get_header(); ?>

<div id="content" class="widecolumn">

<?php get_search_form(); ?>

<h2>Aylara göre arşiv:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Kategorilere göre Arşiv:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_footer(); ?>

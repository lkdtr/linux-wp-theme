<?php get_header(); ?>

<div id="page">
  <div class="wrapper">
    <div id="content" style="min-height: 470px">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      <?php endwhile; endif; ?>
    </div>
  </div>
  <?php include 'bottom_area.php'; ?>
  <?php get_footer(); ?>
</div>
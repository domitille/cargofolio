<?php get_header(); ?>

<?php the_post(); ?>
<h1 class="title"><?php the_title(); ?></h1>
<div id="content">
  <?php the_content(); ?>
</div>
<div id="menu-bottom">
  tags
  <?php
  if(get_the_tag_list()) {
    echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>');
  } ?>
  <?php dynamic_sidebar('menu_widget_area'); ?>
</div>

<?php get_footer(); ?>

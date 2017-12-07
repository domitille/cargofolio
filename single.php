<?php get_header(); ?>

<?php the_post(); ?>
<h1 class="title"><?php the_title(); ?></h1>
<div id="content">
  <?php the_content(); ?>
</div>
<div id="menu-bottom">
  <?php
  if(get_the_tag_list()) {
    echo get_the_tag_list('<div class="tags secondary">tags:',', ','</div>');
  } ?>
  <?php dynamic_sidebar('menu_widget_area'); ?>
</div>

<section class="row">
  <!-- display tag related references -->
  <?php
  $already_displayed_IDs = array($post->ID);

  //for use in the loop, list 9 post titles related to first tag on current post
  $tags = wp_get_post_tags($post->ID);
  if ($tags) {
    $first_tag = $tags[0]->term_id;
    $args_related = array(
      'tag__in' => array($first_tag),
      'post__not_in' => $already_displayed_IDs,
      'posts_per_page' => 5,
      'caller_get_posts' => 1
    );
    $related = new WP_Query($args_related);
  ?>
    <?php if ( $related->have_posts() ) : ?>

      <?php while ($related->have_posts()) : $related->the_post(); array_push($already_displayed_IDs, get_the_ID()); ?>
        <article class="col-lg-4 col-md-6 col-sm-12 related">
          <a href="<?php the_permalink(); ?>"
            class="primary"
            title="<?php printf( __('Go to %s', 'cargofolio'), the_title_attribute('echo=0') ); ?>"
            rel="bookmark">
          <?php if ( has_post_thumbnail() ) {
            echo get_the_post_thumbnail( null, 'cargofolio-thumbnail-home', array( 'width' => 'alignleft' ) );
          } else { ?>
            <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="135" class="" alt="">
          <?php
          } ?>
            <div class="project-name"><?php the_title(); ?></div>
          </a>
          <div class="tags secondary">
          <?php if(get_the_tag_list()) {
            echo get_the_tag_list('',', ');
          } ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php endif;
    wp_reset_query();
  } // if tags
  ?>
</section>

<?php get_footer(); ?>

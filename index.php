<?php get_header(); ?>

<section class="row">
  <?php while ( have_posts() ) : the_post() ?>
  <article class="col-lg-4 col-md-6 col-sm-12">
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
</section>

<?php get_footer(); ?>

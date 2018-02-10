<?php get_header(); ?>

<section class="row">
  <?php while ( have_posts() ) : the_post() ?>
  <article class="col-lg-4 col-md-6 col-sm-12">
    <a href="<?php the_permalink(); ?>"
      class="primary"
      title="<?php printf( __('Go to %s', 'cargofolio'), the_title_attribute('echo=0') ); ?>"
      rel="bookmark">
    <?php if ( has_post_thumbnail() ) {
      $srcset = '';
      foreach (['', '2x', 'mobile'] as $variant) {
        $set = wp_get_attachment_image_src( get_post_thumbnail_id(), 'cargofolio-thumbnail-home'.$variant );
        $srcset .= $set[0] . ' ' . $set[1] . 'w,';
      }
      echo '<img srcset="'.substr($srcset, 0, -1).'" alt="'.get_the_title().'" class="img-fluid rounded" src="'.
        $set[0].'" />';

    } else { ?>
      <img srcset="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" style="width:100%; height: 80%" alt="placeholder">
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

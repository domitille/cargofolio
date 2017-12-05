<div id="sidebar">
  <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

  <ul class="menu projects">
    <?php $aPosts = get_posts('numberposts=-1'); ?>
    <?php foreach($aPosts as $post) : ?>
    <?php setup_postdata($post); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endforeach; ?>
  </ul>

  <div id="menu-bottom">

  <?php
    $tags = get_tags();
    foreach ( $tags as $tag ) {
      if($tag->slug != "migliori"){
        $tag_link = get_tag_link( $tag->term_id );
        $html .= "<li><a href='{$tag_link}' class='{$tag->slug}'>";
        $html .= "{$tag->name}</a></li>";
      }
    }
    $html .= '</ul>';
    echo $html;
  ?>

  </div>

</div>

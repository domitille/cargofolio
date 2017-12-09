<div id="sidebar">

  <ul class="cat primary">
  <?php
    $cats = get_categories();
    foreach ( $cats as $cat ) {
      if($cat->slug != 'uncategorized') {
        $cat_link = get_category_link( $cat->term_id );
        $active = ($cat->term_id === get_queried_object_id())? 'current_page_item' : '';
        $html .= "<li class='{$active}'><a href='{$cat_link}' class='{$cat->slug}'>";
        $html .= "{$cat->name}</a></li>";
      }
    }
    echo $html;
  ?>
  </ul>

  <div class="menu-bottom secondary">
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  </div>

</div>

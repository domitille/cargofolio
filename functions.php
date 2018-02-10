<?php
// Make theme available for translation

// Register widgetized areas
function theme_widgets_init() {
  register_sidebar(
    array (
      'name' => 'Menu Widget Area',
      'id' => 'menu_widget_area',
      'before_widget' => '',
      'after_widget' => '',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );
}
add_action( 'init', 'theme_widgets_init' );

// Check for static widgets in widget-ready areas
function is_sidebar_active( $index ){
  global $wp_registered_sidebars;
  $widgetcolums = wp_get_sidebars_widgets();
  if ($widgetcolums[$index]) return true;
  return false;
}

// Page title
function cargofolio_title() {
  if ( is_single() ) { single_post_title(); }
  elseif ( is_home() || is_front_page() ) { bloginfo('name'); print ' | '; bloginfo('description'); }
  elseif ( is_page() ) { single_post_title(''); }
  elseif ( is_search() ) { bloginfo('name'); print ' | Search results for ' . wp_specialchars($s); }
  elseif ( is_404() ) { bloginfo('name'); print ' | Not Found'; }
  else { bloginfo('name'); wp_title('|'); }
}

// Navigation Menu
if ( function_exists( 'register_nav_menu' ) ) {
  register_nav_menu( 'primary', 'Left Menu' );
}

add_theme_support( 'post-thumbnails' );
add_image_size( 'cargofolio-thumbnail-home', 200, 134, true );
add_image_size( 'cargofolio-thumbnail-home2x', 400, 268, true );
add_image_size( 'cargofolio-thumbnail-homemobile', 800, 536, true );

/*
 * Enable support for custom logo.
 *
 *  @since Twenty Sixteen 1.2
add_theme_support( 'custom-logo', array(
  'height'      => 448,
  'width'       => 352,
  'flex-height' => true,
) );
 */

// Check for WordPress mu or WordPress 3.0
define('CARGOFOLIO_MB', function_exists('get_blog_option'));

// Create Theme Options Page
require_once('theme-options.php');
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php echo strtolower(get_bloginfo('charset')); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Présentation des travaux de Domitille Haffner">
  <meta name="author" content="Domitille Haffner">
  <link rel="icon" href="favicon.ico">

  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url'); ?>" title="<?php printf( __( '%s latest posts', 'cargoteam' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>">
  <link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php printf( __( '%s latest comments', 'cargoteam' ), wp_specialchars( get_bloginfo('name'), 1 ) ); ?>">

  <title><?php cargofolio_title() ?></title>

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

  <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div class="container">
  <div class="row">
    <nav class="col-md-4 col-lg-3">
      <header id="portfolio-title">
        <h1 class="h1">
          <a href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>"
            rel="home"><span><?php bloginfo( 'name' ) ?></span></a>
        </h1>
      </header>
      <?php get_sidebar(); ?>
    </nav>

    <main role="main" class="col-md-8 col-lg-9">

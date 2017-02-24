<?php
/**
* The header for our theme
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package wpstarter
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> <!-- NO SEO - REMOVE BEFORE GOING LIVE -->
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="container-fluid">
      <header class="site-header">
        <a href="<?php echo home_url('/'); ?>" class="logo">
          <img src="<?php bloginfo('template_directory'); ?>/dist/images/logo.png" alt="">
        </a>
        <div class="header-top">
          <div class="cta">
            Give us a call to get started!
            <a href="tel:586-755-8113">(586) 755-8113</a>
          </div>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'top_links',
              'depth' => 1,
              'container' => '',
              'container_class' => '',
              'menu_class' => 'list-inline' )
            );
          ?>
        </div>
        <nav class="site-navigation">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
          <span class="sr-only">Toggle navigation</span>
          <i class="glyphicon glyphicon-th-large"></i> View Franchising Steps
          </button>
          <div class="collapse navbar-collapse" id="main-nav">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'primary',
                'depth' => 2,
                'container' => '',
                'container_class' => '',
                'menu_class' => 'nav navbar-nav navbar-right',
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker' => new wp_bootstrap_navwalker(), )
              );
            ?>
          </div>
        </nav>
      </header>
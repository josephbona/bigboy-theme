<?php
/**
 * wpstarter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpstarter
 * Layout Hooks:
 *
 * wpstarter_before_content // Opening content wrapper
 * wpstarter_after_content // Closing content wrapper
 * wpstarter_before_sidebar // Opening sidebar wrapper
 * wpstarter_after_sidebar // Closing sidebar wrapper
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 */

if ( ! function_exists( 'wpstarter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpstarter_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

  /*
   * Enable support for Post Formats on posts.
   *
   * @link https://developer.wordpress.org/themes/functionality/post-formats/
   */
  add_theme_support( 'post-formats', array( 'link' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wpstarter' ),
    'top_links' => esc_html__( 'Top Links', 'wpstarter' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Remove junk from the <head>
	 */
	remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
  remove_action('wp_head', 'wp_generator'); // remove wordpress version

  remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
  remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

  remove_action('wp_head', 'index_rel_link'); // remove link to index page
  remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

  remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
  remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
  remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

  // remove useless emoji scripts
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
}
endif;
add_action( 'after_setup_theme', 'wpstarter_setup' );

// Remove Tag: Category: etc from archive_title
function wpstarter_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}

add_filter( 'get_the_archive_title', 'wpstarter_archive_title' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpstarter_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpstarter' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wpstarter' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wpstarter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpstarter_scripts() {

	// Set a dynamic version for cache busting
	$theme = wp_get_theme();
	$version = $theme['Version'];

	wp_enqueue_style( 'wpstarter-style', get_template_directory_uri() . '/dist/css/main.css' );

	wp_enqueue_script( 'wpstarter-vendorjs', get_template_directory_uri() . '/dist/js/vendor.min.js', array(), $version, true );

  wp_enqueue_script( 'wpstarter-customjs', get_template_directory_uri() . '/dist/js/main.js', array(), $version, true );

}
add_action( 'wp_enqueue_scripts', 'wpstarter_scripts' );

/**
 * Content Wrap Markup - wpstarter_content_wrap()
 */
if ( !function_exists( 'wpstarter_content_wrap' ) )  {
  function wpstarter_content_wrap() {
    echo '<section class="home-section"><div class="row">';
  }
  add_action( 'wpstarter_before_content', 'wpstarter_content_wrap', 1 );
}

/**
 * After Content Wrap Markup - wpstarter_content_wrap_close()
 */
if (! function_exists('wpstarter_content_wrap_close'))  {
    function wpstarter_content_wrap_close() {
      echo "</div></section>";
    }
    add_action( 'wpstarter_after_content', 'wpstarter_content_wrap_close', 1 );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Bootstrap nav navwalker.
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */
get_header();
if ( have_posts() ) : ?>
<header class="page-header">
	<?php single_post_title( '<h1 class="page-title">', '</h1>' ); ?>
</header>
<?php do_action('wpstarter_before_content'); ?>
<div class="col-md-8 col-sm-6">
<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'archive' );
	endwhile;

	the_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif; ?>
</div>
<?php
get_sidebar('page');
do_action('wpstarter_after_content');
get_footer();

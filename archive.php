<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */
get_header();
if ( have_posts() ) : ?>
<header class="page-header">
	<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
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
<?php
/**
 * The template for all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

get_header();
do_action('wpstarter_before_content');
while ( have_posts() ) : the_post();
get_template_part( 'template-parts/content', 'page' );
get_sidebar('page');
get_template_part( 'template-parts/nextsection' );
do_action('wpstarter_after_content');
endwhile;
get_footer();

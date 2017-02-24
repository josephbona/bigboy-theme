<?php
/**
 * Template Name: Full Width Page
 *
 * The template for pages with no sidebar.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

get_header();
while ( have_posts() ) : the_post();
do_action('wpstarter_before_content');
get_template_part( 'template-parts/content', 'full' );
get_template_part( 'template-parts/nextsection' );
do_action('wpstarter_after_content');
endwhile;
get_footer();

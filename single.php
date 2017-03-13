<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpstarter
 */
get_header();
do_action('wpstarter_before_content');
while ( have_posts() ) : the_post();
get_template_part( 'template-parts/content', get_post_format() );
get_sidebar('page');
do_action('wpstarter_after_content');
endwhile;
get_footer();

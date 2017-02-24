<?php
/**
 * Template Name: Contact Page
 *
 * The template for contact us page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

get_header();
while ( have_posts() ) : the_post();
do_action('wpstarter_before_content');
get_template_part( 'template-parts/content', 'contact' );
get_sidebar('contact');
do_action('wpstarter_after_content');
endwhile;
get_footer();

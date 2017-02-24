<?php
/**
 * Template Name: Child Page
 *
 * The template for child pages that are used for franchising sub-steps.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

get_header();
while ( have_posts() ) : the_post();
get_template_part( 'template-parts/header', 'childpage' );
do_action('wpstarter_before_content');
get_template_part( 'template-parts/content', 'page' );
get_sidebar('page');
get_template_part( 'template-parts/nextsection' );
do_action('wpstarter_after_content');
endwhile;
get_footer();

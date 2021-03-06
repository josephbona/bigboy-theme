<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

get_header(); ?>
	<section class="home-slider">
	  <div class="item">
	  	<img data-lazy="<?php bloginfo('template_directory'); ?>/dist/images/slides/BB20-8.jpg" alt="">
	  </div>
	  <div class="item">
	  	<img data-lazy="<?php bloginfo('template_directory'); ?>/dist/images/slides/BB20-43.jpg" alt="">
	  </div>
	  <div class="item">
	  	<img data-lazy="<?php bloginfo('template_directory'); ?>/dist/images/slides/BB20-6.jpg" alt="">
	  </div>
	  <div class="item">
	  	<img data-lazy="<?php bloginfo('template_directory'); ?>/dist/images/slides/BB20-44.jpg" alt="">
	  </div>
	  <div class="item">
	  	<img data-lazy="<?php bloginfo('template_directory'); ?>/dist/images/slides/BB20-10.jpg" alt="">
	  </div>
	</section>
	<?php do_action('wpstarter_before_content'); ?>
    <div class="col-md-5 col-md-push-7">
      <div class="widget-apply">
        <div class="widget-inner">
          <h3 class="lined widget-title">Opportunity Awaits!</h3>
          <p>Fill out the form to request more information.</p>
          <?php get_template_part('template-parts/form', 'short'); ?>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-md-pull-5 text-center">
      <h3 class="m-b-0 m-t-40">Available Markets Throughout The Country</h3>
      <p>Discover A Great Opportunity Near You! <a class="text-link" href="<?php echo get_page_link(27); ?>">Click Here.</a></p>
      <a href="<?php echo get_page_link(27); ?>"><img src="<?php bloginfo('template_directory'); ?>/dist/images/map.jpg" alt="" class="img-responsive"></a>
    </div>
	<?php
	do_action('wpstarter_after_content');
	do_action('wpstarter_before_content');
	?>
    <div class="col-md-4 col-sm-6 hidden-xs">
      <img src="<?php bloginfo('template_directory'); ?>/dist/images/running.jpg" alt="" class="img-responsive">
    </div>
  	<?php
  	while ( have_posts() ) : the_post();
  	get_template_part( 'template-parts/content', 'page' );
  	endwhile;
do_action('wpstarter_after_content');
get_footer();

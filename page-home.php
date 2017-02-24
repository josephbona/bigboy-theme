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
	<section class="home-section">
	  <div class="row">
	    <div class="col-md-5 col-md-push-7">
	      <div class="widget-apply">
	        <div class="widget-inner">
	          <h3 class="lined widget-title">Opportunity Awaits!</h3>
	          <p>Fill out the form to request more information.</p>
	          <form>
	            <div class="form-row">
	              <div class="form-col">
	                <div class="form-group">
	                  <label>First Name*</label>
	                  <input type="text" class="form-control input-sm">
	                </div>
	              </div>
	              <div class="form-col">
	                <div class="form-group">
	                  <label>Last Name*</label>
	                  <input type="text" class="form-control input-sm">
	                </div>
	              </div>
	            </div>
	            <div class="form-row">
	              <div class="form-col">
	                <div class="form-group">
	                  <label>Email Address*</label>
	                  <input type="email" class="form-control input-sm">
	                </div>
	              </div>
	              <div class="form-col">
	                <div class="form-group">
	                  <label>Phone Number*</label>
	                  <input type="email" class="form-control input-sm">
	                </div>
	              </div>
	            </div>
	            <div class="form-group">
	              <label>Questions/Comments</label>
	              <textarea rows="3" class="form-control input-sm"></textarea>
	            </div>
	            <button type="submit" class="btn btn-primary btn-block">Request More Information</button>
	          </form>
	        </div>
	      </div>
	    </div>
	    <div class="col-md-7 col-md-pull-5 text-center">
	      <h3 class="m-b-0">Available Markets Throughout The Country</h3>
	      <p>Discover A Great Opportunity Near You! <a class="text-link" href="markets.html">Click Here.</a></p>
	      <a href="markets.html"><img src="<?php bloginfo('template_directory'); ?>/dist/images/map.jpg" alt="" class="img-responsive"></a>
	    </div>
	  </div>
	</section>
	<section class="home-section">
	  <div class="row">
	    <div class="col-md-4 col-sm-6 hidden-xs">
	      <img src="<?php bloginfo('template_directory'); ?>/dist/images/running.jpg" alt="" class="img-responsive">
	    </div>
	    <div class="col-md-8 col-sm-6">
	    	<?php
	    	while ( have_posts() ) : the_post();

	    		get_template_part( 'template-parts/content', 'page' );

	    	endwhile; // End of the loop.
	    	?>
	    </div>
	  </div>
	</section>
<?php
get_footer();

<?php
/**
 * The sidebar for pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wpstarter
 */
?>
<div class="col-md-4 col-sm-6">
<?php if (is_page(23)) : ?>
  <div style="position:relative;height:0;padding-bottom:56.25%;margin-bottom:20px;"><iframe src="https://www.youtube.com/embed/joUc4Ye1SBY?rel=0&amp;showinfo=0?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
<?php endif; ?>
<div class="widget-apply">
  <div class="widget-inner">
    <h3 class="lined widget-title">Opportunity Awaits!</h3>
    <p>Fill out the form to request more information.</p>
    <?php get_template_part('template-parts/form', 'short') ?>
  </div>
</div>
<?php if (is_page(13)) : ?>
  <div class="m-t-20 history-slider">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/old-bobs-photo.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-1.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-2.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-3.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-4.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-5.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-6.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-7.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-8.jpg" class="img-responsive">
    <img src="<?php bloginfo('template_directory'); ?>/dist/images/oldies/old-9.jpg" class="img-responsive">
  </div>

<?php endif; ?>
</div>
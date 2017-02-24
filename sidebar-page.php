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
<div class="widget-apply">
  <div class="widget-inner">
    <h3 class="lined widget-title">Opportunity Awaits!</h3>
    <p>Fill out the form to request more information.</p>
    <?php get_template_part('template-parts/form', 'short') ?>
  </div>
</div>
<?php if (is_page(13)) : ?>
  <img style="margin-top: 20px;" src="<?php bloginfo('template_directory'); ?>/dist/images/old-bobs-photo.jpg" alt="" class="img-responsive">
<?php endif; ?>
</div>
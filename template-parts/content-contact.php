<?php
/**
 * Template part for displaying page content in page-contact.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

?>
<div class="col-md-7 col-sm-6 entry-content">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if(!is_front_page()) : ?>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<div class="panel panel-default">
			<div class="panel-body">
				<?php get_template_part('template-parts/form', 'short'); ?>
			</div>
		</div>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'wpstarter' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
</div>
<div class="col-md-1"></div>
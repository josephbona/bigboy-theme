<?php
/**
 * Template part for displaying posts in archive
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpstarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('archive-post'); ?>>
	<header class="entry-header">
		<?php
		$post_format =  get_post_format();
		switch ($post_format) {
			case 'link':
				$link_url = get_post_meta( get_the_ID(), 'press-link', true );
				break;

			default:
				$link_url = get_the_permalink();
				break;
		} ?>
		<h2 class="entry-title"><a href="<?php echo $link_url; ?>"><?php the_title(); ?></a></h2>
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wpstarter_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php wpstarter_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

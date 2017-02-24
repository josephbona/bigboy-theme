<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wpstarter
 */

if ( ! function_exists( 'wpstarter_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wpstarter_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'wpstarter' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'wpstarter' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'wpstarter_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wpstarter_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'wpstarter' ) );
		if ( $categories_list && wpstarter_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wpstarter' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'wpstarter' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wpstarter' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'wpstarter' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'wpstarter' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wpstarter_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wpstarter_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wpstarter_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wpstarter_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wpstarter_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wpstarter_categorized_blog.
 */
function wpstarter_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wpstarter_categories' );
}
add_action( 'edit_category', 'wpstarter_category_transient_flusher' );
add_action( 'save_post',     'wpstarter_category_transient_flusher' );

if ( ! function_exists( 'wpstarter_breadcrumbs' ) ) :
/**
 * Prints breadcrumb HTML using Bootstrap markup.
 */
function bootstrap_breadcrumbs() {
	// text for the 'Home' link
	$home      = __('<i class="fa fa-home"></i>', 'bootstrapwp');
	// tag before the current crumb
	$before    = '<li class="active">';
	$sep       = '';
	// tag after the current crumb
	$after     = '</li>';
	if (!is_home() && !is_front_page() || is_paged()) {
		echo '<ol class="breadcrumb">';
		  global $post;
		  $homeLink = home_url();
	  	echo '<li><a href="' . $homeLink . '">' . $home . '</a> '.$sep. '</li> ';
  		if (is_category()) {
			  global $wp_query;
			  $cat_obj   = $wp_query->get_queried_object();
			  $thisCat   = $cat_obj->term_id;
			  $thisCat   = get_category($thisCat);
			  $parentCat = get_category($thisCat->parent);
			  if ($thisCat->parent != 0) {
			  echo get_category_parents($parentCat, true, $sep);
			  }
			  echo $before . __('Archive by category', 'bootstrapwp') . ' "' . single_cat_title('', false) . '"' . $after;
			} elseif (is_day()) {
			  echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
			    'Y'
			  ) . '</a></li> ';
			  echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
			    'F'
			  ) . '</a></li> ';
			  echo $before . get_the_time('d') . $after;
	  	} elseif (is_month()) {
			  echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time(
			    'Y'
			  ) . '</a></li> ';
			  echo $before . get_the_time('F') . $after;
	  	} elseif (is_year()) {
	  		echo $before . get_the_time('Y') . $after;
	  	} elseif (is_single() && !is_attachment()) {
			  if (get_post_type() != 'post') {
				  $post_type = get_post_type_object(get_post_type());
				  $slug      = $post_type->rewrite;
				  echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ';
				  echo $before . get_the_title() . $after;
			  } else {
				  $cat = get_the_category();
				  $cat = $cat[0];
				  echo '<li>'.get_category_parents($cat, true, $sep).'</li>';
				  echo $before . get_the_title() . $after;
			  }
	  	} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			  $post_type = get_post_type_object(get_post_type());
			  echo $before . $post_type->labels->singular_name . $after;
	  	} elseif (is_attachment()) {
			  $parent = get_post($post->post_parent);
			  $cat    = get_the_category($parent->ID);
			  $cat    = $cat[0];
			  echo get_category_parents($cat, true, $sep);
			  echo '<li><a href="' . get_permalink(
			    $parent
			  ) . '">' . $parent->post_title . '</a></li> ';
			  echo $before . get_the_title() . $after;
	  	} elseif (is_page() && !$post->post_parent) {
	  		echo $before . get_the_title() . $after;
	  	} elseif (is_page() && $post->post_parent) {
			  $parent_id   = $post->post_parent;
			  $breadcrumbs = array();
			  while ($parent_id) {
				  $page          = get_page($parent_id);
				  $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title(
				    $page->ID
				  ) . '</a>' . $sep . '</li>';
				  $parent_id     = $page->post_parent;
			  }
			  $breadcrumbs = array_reverse($breadcrumbs);
			  foreach ($breadcrumbs as $crumb) {
			  	echo $crumb;
			  }
			  echo $before . get_the_title() . $after;
	  	} elseif (is_search()) {
	  		echo $before . __('Search results for', 'bootstrapwp') . ' "'. get_search_query() . '"' . $after;
	  	} elseif (is_tag()) {
	  		echo $before . __('Posts tagged', 'bootstrapwp') . ' "' . single_tag_title('', false) . '"' . $after;
	  	} elseif (is_author()) {
			  global $author;
			  $userdata = get_userdata($author);
			  echo $before . __('Articles posted by', 'bootstrapwp') . ' ' . $userdata->display_name . $after;
	  	} elseif (is_404()) {
	  		echo $before . __('Error 404', 'bootstrapwp') . $after;
		  }
		echo '</ol>';
	}
}
endif;
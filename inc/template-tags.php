<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
if ( ! function_exists( 'understrap_posted_on' ) ) {
	function understrap_posted_on() {
		$time_icon = '<svg class="time-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
  <path id="Path_13" data-name="Path 13" d="M2.4,2.4A7.263,7.263,0,0,1,8,0a7.263,7.263,0,0,1,5.6,2.4A7.263,7.263,0,0,1,16,8a7.263,7.263,0,0,1-2.4,5.6A7.263,7.263,0,0,1,8,16a7.263,7.263,0,0,1-5.6-2.4A7.984,7.984,0,0,1,0,8,7.263,7.263,0,0,1,2.4,2.4Zm9.2,9.2.933-.933L9.2,7.333,8,2H6.667V8a1.21,1.21,0,0,0,.4.933.466.466,0,0,0,.267.133Z" fill="#000203"/>
</svg>';
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on   = apply_filters(
			'understrap_posted_on', sprintf(
				$time_icon . '<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
				esc_html_x( '', 'post date', 'understrap' ),
				esc_url( get_permalink() ),
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);
		// $byline      = apply_filters(
		// 	'understrap_posted_by', sprintf(
		// 		'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
		// 		$posted_on ? esc_html_x( '', 'post author', 'understrap' ) : esc_html_x( '', 'post author', 'understrap' ),
		// 		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		// 		esc_html( get_the_author() )
		// 	)
		// );
		global $post;
		$byline = irw_post_authors($post->ID);
		echo $byline . $posted_on; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'understrap_post_author' ) ) {
	function understrap_post_author() {
		$author_id = get_the_author_meta( 'ID' );
		$time_icon = '<img class="time-icon" src="' . get_stylesheet_directory_uri() . '/assets/images/time.svg" />';
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on   = apply_filters(
			'understrap_posted_on', sprintf(
				'<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
				esc_html_x( '', 'post date', 'understrap' ),
				esc_url( get_permalink() ),
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);
		$byline      = apply_filters(
			'understrap_posted_by', sprintf(
				'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
				$posted_on ? esc_html_x( '', 'post author', 'understrap' ) : esc_html_x( '', 'post author', 'understrap' ),
				esc_url( get_author_posts_url( $author_id ) ),
				esc_html( get_field('author_full', 'user_'. $author_id ) )
			)
		);
		echo $byline . $posted_on; // WPCS: XSS OK.
	}
}

if ( ! function_exists( 'understrap_author' ) ) {
	function understrap_author() {
		
		$author      = apply_filters(
			'understrap_author', sprintf(
				'<span class="byline"> %1$s<span class="author vcard"><a class="url fn n" href="%2$s"> %3$s</a></span></span>',
				$posted_on ? esc_html_x( '', 'post author', 'understrap' ) : esc_html_x( '', 'post author', 'understrap' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			)
		);
		echo $author; // WPCS: XSS OK.
	}
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'understrap_entry_footer' ) ) {
	function understrap_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
			if ( $categories_list && understrap_categorized_blog() ) {
				/* translators: %s: Categories of current post */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
			if ( $tags_list ) {
				/* translators: %s: Tags of current post */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
			echo '</span>';
		}
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				esc_html__( 'Edit %s', 'understrap' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
}


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'understrap_categorized_blog' ) ) {
	function understrap_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'understrap_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );
			set_transient( 'understrap_categories', $all_the_cool_cats );
		}
		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so components_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so components_categorized_blog should return false.
			return false;
		}
	}
}


if ( ! function_exists( 'irw_post_authors' ) ) {
	function irw_post_authors() {
		global $post;
		//echo $post_id;
		$author_ids = array();
		$authors = array();
		$display_date = '';
		$other_author = '';
		if( get_field('post_authors', $post->ID) ) {
			$author_ids = get_field('post_authors', $post->ID);
		} elseif(get_field('post_external_author', $post->ID)) {
			$other_author = get_field('post_external_author', $post->ID);
		}
		
		if($author_ids) {
			foreach ($author_ids as $author_id) { 

				// if(get_field('pub_date', $post_id)) {
				// 	$display_date = get_field('pub_date', $post_id);
				// } elseif(get_field('pub_expected_date', $post_id)) {
				// 	$display_date = get_field('pub_expected_date', $post_id);
				// }	

				$user_info = get_userdata($author_id);	
				//print_r($user_info);
				
								
				$authors[] .= '<a href="' . get_author_posts_url( $author_id ) . '">' . $user_info->display_name . '</a>';
				
			}
		} elseif($other_author) {
			$authors[] = $other_author;
		}
		// if($authors) {
		 	print implode(', ', $authors ); 
		// } else {
		// 	print $display_date;
		// }
		
		
	}
}

if ( ! function_exists( 'irw_the_terms' ) ) {
	function irw_the_terms($post_id) {
		
		echo '<div class="terms">';
		the_terms( $post_id, 'category', '', ' / ' );
		echo ' / ';
		the_terms( $post_id, 'sender', '', ' / ' );
		echo '</div>';
	}
}



/**
 * Flush out the transients used in understrap_categorized_blog.
 */
add_action( 'edit_category', 'understrap_category_transient_flusher' );
add_action( 'save_post',     'understrap_category_transient_flusher' );

if ( ! function_exists( 'understrap_category_transient_flusher' ) ) {
	function understrap_category_transient_flusher() {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Like, beat it. Dig?
		delete_transient( 'understrap_categories' );
	}
}

add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        }    
    return $title;    
});

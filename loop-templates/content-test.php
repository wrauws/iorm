<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article id="post-<?php the_ID(); ?>" class="row common-post">
	<div class="col-auto post-thumbnail">
		<?php echo get_the_post_thumbnail( $post->ID, 'small' ); ?>
	</div><!-- .col-4 post-thumbnail -->
	<div class="col post-content">
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
		<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php understrap_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_excerpt(); ?>
	</div><!-- .col-8 post-content -->
</article>

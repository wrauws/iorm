<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



<div class="blog-item col-sm-6 col-lg-4 col-xl-3">	
	<article id="post-<?php the_ID(); ?>" class="blog-item-inner" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>);">

			<div class="blog-content">
				<a href="<?php echo get_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
				<div class="post-excerpt ">
					<?php the_excerpt(); ?>
				</div>
				<div class="blog-footer">
				
					By <?php understrap_author(); ?>
					<div class="event-location"><?php the_field('event_location'); ?></div>
				
				</div>
			</div>
			
		

	</article>

</div>







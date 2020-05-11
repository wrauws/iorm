<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



	<article id="post-<?php the_ID(); ?>" class="row no-gutters common-post">
		
		<div class="post-thumbnail col-6">
			<div class="post-thumbnail-container" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>);">
				<div class="inner"></div>
			</div>

		</div><!-- .col-4 post-thumbnail -->
		
		<div class="post-content col-6">
	
				<a href="<?php echo get_permalink(); ?>">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</a>
			
				<div class="entry-meta">
					<?php 
					
					irw_the_terms(get_the_ID());
					understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
			
				<div class="post-excerpt ">
					<?php the_excerpt(); ?>
				</div>
		
		</div><!-- .col-8 post-content -->

	</article>





<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



	<article id="post-<?php the_ID(); ?>" class="common-post">
		<div class="row">
		
			<div class="col-6 col-md-4 col-lg-3">
				<a href="<?php echo get_permalink(); ?>">
				<div class="post-thumbnail-container" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>);">
					<div class="inner"></div>
				</div>
				</a>

			</div><!-- .col-4 post-thumbnail -->
			
			<div class="col-6 col-md-8 col-lg-9">
				<div class="row">
					<div class="col-lg-8">
						<a href="<?php echo get_permalink(); ?>">
							<h2 class="entry-title"><?php the_title(); ?></h2>
							<div class="post-excerpt ">
								<?php the_excerpt(); ?>
							</div>
						</a>
					</div>

					<div class="entry-meta col-lg-4">
						<?php understrap_posted_on(); ?>
					</div><!-- .entry-meta -->
				</div>

			</div><!-- .col-8 post-content -->
	
		</div>
				
	</article>





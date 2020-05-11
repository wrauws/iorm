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
		
		<div class="post-thumbnail col-sm-5">
			<a href="<?php echo get_permalink(); ?>">
			<div class="post-thumbnail-container" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>);">
				<div class="inner"></div>
				<?php if(has_term('podcasts', 'category', $post->ID)) {
					echo '<div class="podcast-icon"></div>';
				} ?>
			</div>
		</a>

		</div><!-- .col-4 post-thumbnail -->
		
		<div class="post-content col-sm-7">
	
				<a href="<?php echo get_permalink(); ?>">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</a>
			
				<div class="entry-meta">
					<?php 
					

// 					$queried = get_queried_object();
// print_r($queried);
					//echo $posttype;
					irw_the_terms(get_the_ID());
				
					 ?>
					<?php understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
			
				<div class="post-excerpt ">
					<?php the_excerpt(); ?>
				</div>
		
		</div><!-- .col-8 post-content -->

	</article>





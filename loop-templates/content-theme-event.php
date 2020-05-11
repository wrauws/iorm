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
		<a href="<?php echo get_permalink(); ?>">
		<div class="post-thumbnail col-sm-5">
			
				<div id="post-<?php the_ID(); ?>" class="event" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>);">
						<div class="event-category">
							<?php the_terms( $post->ID, 'event_category', '', ' / ' ); ?>
						</div>
						<div class="event-date">
							<?php 
							$unixtimestamp = strtotime( get_field('event_date') );
							echo date_i18n( "F n Y", $unixtimestamp );
							?>
								
							</div>

						<div class="event-flag"></div>

						<div class="event-content">
							
						</div>
						<div class="event-footer">
							
								
								<div class="event-location"><?php the_field('event_location'); ?></div>
							
						</div>
					

				</div>

		



		</div><!-- .col-4 post-thumbnail -->
		
		<div class="post-content col-sm-7">
	
				
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</a>
				<div class="entry-meta">
					<?php
					$posttype = get_post_type( get_the_ID() );

					if($posttype == 'events') {
						echo '<div class="terms"><a href="' . get_post_type_archive_link( $posttype ) . '">Event</a></div>';
					} 
					 understrap_posted_on(); ?>
				</div><!-- .entry-meta -->
			
				<div class="post-excerpt ">
					<?php the_excerpt(); ?>
				</div>
		
		</div><!-- .col-8 post-content -->

			
		</a>
	</article>





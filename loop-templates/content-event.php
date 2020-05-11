<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>


<div class="event-column">	
	<article id="post-<?php the_ID(); ?>" class="event" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'large' ); ?>);">
			<div class="event-category">
				<?php foreach (get_the_terms(get_the_ID(), 'event_category') as $cat) {
					   echo $cat->name;
					}; ?>
			</div>
			<div class="event-date">
				<?php 
				$unixtimestamp = strtotime( get_field('event_date') );
				echo date_i18n( "F n Y", $unixtimestamp );
				?>
					
				</div>

			<div class="event-flag"></div>

			<div class="event-content">
				<a href="<?php echo get_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
				</a>
				<div class="post-excerpt ">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<div class="event-footer">
				
					
					<div class="event-location"><?php the_field('event_location'); ?></div>
				
			</div>
		

	</article>

</div>



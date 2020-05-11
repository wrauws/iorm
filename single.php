<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<footer class="entry-footer row">

						<div class="col-sm-6">
							<?php get_template_part( 'global-templates/terms-full'); ?>
						</div>
						<div class="col-sm-6">
							<a href="javascript:history.go(-1)" title="Return to the previous page" class="button-back" ><span></span>Back</a>
						</div>

					</footer><!-- .entry-footer -->

					
					<?php //understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		
					<?php
					$unique_array = array();
					$terms = get_the_terms( get_the_ID(), 'rw_theme' );
					if($terms) {
						foreach($terms as $term) {
							 $term_ids[] = $term->term_id;
						}
						$unique_array = array_unique( $term_ids );
					}

					// WP_Query arguments
					//print_r($unique_array);
					$args = array(
						//'post_type' => array( $post->post_type ),
						'post_type' => array( 'post', 'events' ),
						'posts_per_page' => 3,
						'post__not_in' => array($post->ID),
						'no_found_rows' => true,
						'tax_query' => array(
					        array(
					            'taxonomy' => 'rw_theme',
					            'field'    => 'ID',
					            'terms'    => $unique_array,
					        ),
					    ),
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) { ?>
						<div class="related-articles">
							<h2 class="related">RELATED</h2>
							<?php
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part( 'loop-templates/content', 'related' );
							} ?>
						</div>
					<?php	
					} else {
						// no posts found
					}



					// Restore original Post Data
					wp_reset_postdata();
				?>
		

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>



<?php get_footer(); ?>

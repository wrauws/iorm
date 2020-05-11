<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>


<!-- <h1 class="page-title"><?php the_title(); ?></h1> -->


	<!-- Do the left sidebar check -->
	<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

	<main class="site-main" id="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'loop-templates/content', 'page' ); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>

		<?php endwhile; // end of the loop. ?>

	</main><!-- #main -->
	<div class="author-overview row">
	<?php
					// WP_User_Query arguments
					$args = array(
						// 'role' => 'author',
						'order' => 'ASC',
						'orderby' => 'meta_value_num',
						'meta_key' => 'author_order',
						'meta_query' => array(
					        array(
					            'key' => 'author_order',
					            'type' => 'numeric'
					        )
					    ),
						'exclude'        => array( 1 ),
					);

					// The User Query
					$user_query = new WP_User_Query( $args );

					// The User Loop
					if ( ! empty( $user_query->results ) ) {
						foreach ( $user_query->results as $user ) { 
							include( locate_template( 'loop-templates/content-team.php', false, false ) );
						}
					} else {
						// no users found
				} ?>
	</div>			

	<!-- Do the right sidebar check -->
	<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>





<?php get_footer(); ?>

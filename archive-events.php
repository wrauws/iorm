<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$term = get_queried_object();
$container = get_theme_mod( 'understrap_container_type' );
?>



	<?php
				
		if(get_field('theme_banner_image', $term)) {
			echo '<h1 class="page-title">Events</h1>';
			$banner_image = get_field('theme_banner_image', $term);
			$url = $banner_image['url'];
			echo '<div class="theme-banner" style="background-image: url(' . $url . ');"></div>';
		} else {
			echo '<h1 class="page-title no-banner">Events</h1>';
		}
				
	?>
		</header><!-- .page-header -->
		
	
		<?php if($term->taxonomy == 'rw_theme') { ?>
			<div class="theme-header row">
				<div class="theme-quote col-sm-6 align-self-center">
					<?php the_field('theme_quote', $term); ?>

				</div>

				<div class="theme-description col-sm-5 offset-sm-1 align-self-center">
					<?php the_archive_description( '', '' ); ?>
				</div>
				
					
			</div>	
			<hr class="theme-hr col-sm-6" />	
		<?php } ?>	
	
		<div class="events row">
		<?php if ( have_posts() ) : ?>

			

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'loop-templates/content', get_post_format() );
				get_template_part( 'loop-templates/content', 'event' );
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div>	

<?php get_footer(); ?>

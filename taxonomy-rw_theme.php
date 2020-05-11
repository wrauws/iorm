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
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			$banner_image = get_field('theme_banner_image', $term);
			$url = $banner_image['url'];
			echo '<div class="theme-banner" style="background-image: url(' . $url . ');"></div>';
		} else {
			the_archive_title( '<h1 class="page-title no-banner">', '</h1>' );
		}
				
	?>
		</header><!-- .page-header -->
		
	
		<?php if($term->taxonomy == 'rw_theme') { ?>
			<div class="theme-header row">
				<div class="theme-quote col-sm-6 align-self-center">
					<?php the_field('theme_quote', $term); ?>

				</div>

				<div class="col-sm-6 theme-header-content">
					<div class="theme-description">
					<?php 
					the_archive_description( '', '' ); ?>
					</div>

					<?php
					if(get_field('theme_second_intro', $term)) {
							echo '<div class="second-intro">';
							the_field('theme_second_intro', $term);
							echo '</div>';
						}
						?>
				</div>
				
						
			</div>	
			<hr class="theme-hr" />	
		<?php } ?>	
	
		
		<?php
		if(is_category( 'blog' )) {
			echo '<div class="row">';
		}

		 if ( have_posts() ) : ?>

			

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'loop-templates/content', get_post_format() );

				$posttype = get_post_type( get_the_ID() );
				
				if($posttype == 'events') {
					get_template_part( 'loop-templates/content', 'theme-event');
				} elseif(is_category( 'blog' )) {
					get_template_part( 'loop-templates/content', 'blog');
				} else {
					get_template_part( 'loop-templates/content', 'archive');
				}	
				
				//print_r($post);
				?>

			<?php endwhile; 

				
			 else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; 
			if(is_category( 'blog' )) {
					echo '</div>';
				}	
		?>

		

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>



<?php get_footer(); ?>

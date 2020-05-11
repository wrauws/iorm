<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<!-- content here -->


		
		<?php if ( have_posts() ) : ?>

		<div class="home-featured">
			<h2>Featured</h2>
		</div>	

		<div class="home-featured-posts">
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
					get_template_part( 'loop-templates/content', 'home');
				}	
				
				?>

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'loop-templates/content', 'none' ); ?>

		<?php endif; ?>

		

			<!-- The pagination component -->
			<?php 

			if ( get_next_posts_link() ) : 
				$url = get_next_posts_page_link();
				?>
			<div class="row">	
				<div class="col-lg-6 offset-lg-6">
					<a class="readmore button" href="<?php echo $url; ?>">
				   	Read more...
					   <svg version="1.1" id="arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 8 10" style="enable-background:new 0 0 8 10;" xml:space="preserve">
						<path id="right" d="M7.5,5L2.1,9.7L0.5,8.3L4.3,5L0.5,1.7l1.6-1.4L7.5,5z"/>
						</svg><svg version="1.1" id="arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 8 10" style="enable-background:new 0 0 8 10;" xml:space="preserve">
						<path id="right" d="M7.5,5L2.1,9.7L0.5,8.3L4.3,5L0.5,1.7l1.6-1.4L7.5,5z"/>
						</svg>
				    </a>
				</div>
			</div>	
			<?php
			endif;
			//understrap_pagination(); ?>


		</div>	

<?php get_footer(); ?>

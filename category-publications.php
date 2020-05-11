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

				the_archive_title( '<h1 class="page-title">', '</h1>' );
				
				if(get_field('theme_banner_image', $term)) {
					$banner_image = get_field('theme_banner_image', $term);
					$url = $banner_image['url'];
					echo '<div class="theme-banner" style="background-image: url(' . $url . ');"></div>';
				} else { ?>
					<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					<?php
				}
				
				?>
		</header><!-- .page-header -->
		
	<div class="theme-header row">
				<?php the_archive_description( '', '' ); ?>
	</div>
	

<!-- Nav tabs -->
<ul class="nav publications-nav" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="active" id="by-us-tab" data-toggle="tab" href="#by-us" role="tab" aria-controls="By us" aria-selected="true">Publications by us</a>
  </li>
  <li class="nav-item">
    <a class="" id="by-others-tab" data-toggle="tab" href="#by-others" role="tab" aria-controls="By others" aria-selected="false">Publications by others</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="by-us" role="tabpanel" aria-labelledby="by-us-tab">
  	

				
			
				<?php if ( have_posts() ) {
					while ( have_posts()  ) {

						the_post(); 

						if(has_term('by_us', 'sender', $post->ID)) {
							echo 'by us';
						}
						?>

					<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					//get_template_part( 'loop-templates/content', get_post_format() );
					get_template_part( 'loop-templates/content', 'publication-archive' );
					?>

				<?php } } 
			// Restore original Post Data
				wp_reset_postdata();
				?>


			

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
  </div>
  <div class="tab-pane" id="by-others" role="tabpanel" aria-labelledby="by-others-tab">
 

		

  
</div>

<?php get_footer(); ?>

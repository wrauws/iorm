<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<header class="entry-header">
		<?php 
		$url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		echo '<div class="article-banner" style="background-image: url(' . $url . ');"></div>';
		  ?>
		
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php get_template_part( 'global-templates/terms'); ?>

		<div class="entry-meta">
			<?php
				// $userid = get_the_author_meta( 'ID' );
    //             $user_string = 'user_' . $userid;
    //             $name = get_field('author_full', $user_string);
    //             $image = get_field('author_image', $user_string);
    //             //$function = get_field('author_title', $user_string);
    //             //$author_short_description = get_field('author_short_description', $user_string);
               
    //             if( !empty( $image ) ): 
    //             	$image_atts = wp_get_attachment_image_src( $image, 'large' );
    //             endif;
    //             echo '<div class="author-image" style="background-image: url(' . $image_atts[0] . ')">';
            ?>
            	
      
			
			<?php understrap_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>

	</div><!-- .entry-content -->

	
	
	
	</div>

<?php //understrap_entry_footer(); ?>

</article><!-- #post-## -->

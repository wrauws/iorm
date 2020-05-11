<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( isset( $_GET['author_name'] ) ) {
	$curauth = get_user_by( 'slug', $author_name );
} else {
	$curauth = get_userdata( intval( $author ) );
}

$user_string = 'user_' . $curauth->ID;


$name = get_field('author_full', $user_string);
$image = get_field('author_image', $user_string);
$function = get_field('author_title', $user_string);
$author_short_description = get_field('author_short_description', $user_string);

if( !empty( $image ) ): 
	$image_atts = wp_get_attachment_image_src( $image, 'large' );

endif;
?>



			<main class="site-main" id="main">

				<header class="page-header author-header">

					<h1 class="page-title">Authors</h1>

					


					
				</header><!-- .page-header -->
				<div class="author-image" style="background-image: url(<?php echo $image_atts[0]; ?>)">    
            	
		        </div>
		           
		            
		            <h2 class="author_title"><?php echo $name; ?></h2>
		            <p class="author_function"><?php echo $function; ?></p>
		            <p class="author_institute"><?php echo $author_short_description;?></p>


					<?php if ( ! empty( $curauth->user_url ) || ! empty( $curauth->user_description ) ) : ?>
						

							<?php if ( ! empty( $curauth->user_description ) ) : ?>
							<div class="author-bio">
								<?php esc_html_e( $curauth->user_description ); ?>
							</div>
							<?php endif; ?>
					
					<?php endif; ?>

<?php	

// args
$args = array(
	'numberposts'	=> -1,
	'post_type' => array( 'post', 'events' ),	
	'meta_query'	=> array(
	
		array(
			'key'		=> 'post_authors',
			'value'		=> $curauth->ID,
			'compare'	=> 'LIKE'
		),
	
	)
);



// query
$the_query = new WP_Query( $args );

//print_r($the_query);
?>		

					<!-- The Loop -->
					<?php if ( $the_query->have_posts() ) : ?>
						<div class="author-posts clearfix">
						<h2><?php echo esc_html( 'by', 'understrap' ) . ' ' . $name; ?>:</h2>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
							get_template_part( 'loop-templates/content', 'related' );
						endwhile; ?>
						</div>

					<?php else : ?>

						

					<?php endif; ?>

					<!-- End Loop -->


			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>


<?php get_footer(); ?>

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

<div id="index-wrapper" class="container">
	<div class="content">
		The Content here comes this: <a href="https://smallenvelop.com/limit-post-excerpt-length-in-wordpress/">https://smallenvelop.com/limit-post-excerpt-length-in-wordpress/</a>
	</div><!-- .content -->
</div><!-- #index-wrapper .col -->

<?php get_footer(); ?>

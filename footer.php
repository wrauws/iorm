<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->





<!-- footer content here -->

</div><!-- #page in the header -->

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>



<?php wp_footer(); ?>

</body>

</html>


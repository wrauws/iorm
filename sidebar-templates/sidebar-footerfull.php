<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>



	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div id="wrapper-footer-full">

		<div class="container-fluid" id="footer-full-content" tabindex="-1">
			<div class="row footer-content">
				<div class="col-sm-6">
						<div class="hr-title d-block d-sm-none"></div>
						<img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/uu-logo-en.svg" />
						<h1 class="footer-title"><?php bloginfo('name'); ?></h1>
					
				</div>
				<div class="col-sm-6">
					<nav class="footer-menu ">
						<?php
						$menu_setting = array (
							'theme_location' => 'footer_menu',
							);
							wp_nav_menu( $menu_setting );
						?>
					</nav>
				</div>

			</div>
			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->


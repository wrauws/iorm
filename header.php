<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div id="page"><!-- closes in the footer -->
<!-- start header -->

<div id="header-wrapper">
	<div class="uu-bar">
		! UU Branding
	</div><!-- .uu-bar -->

	<div class="menus">
		<div class="main-menu">
			<?php
				$menu_setting = array (
					'theme_location' => 'primary_menu',
				);
				wp_nav_menu( $menu_setting );
			?>
		</div><!-- .main-menu -->
		<div class="secondary-menu">
			<?php
				$menu_setting = array (
					'theme_location' => 'secondary_menu',
				);
				wp_nav_menu( $menu_setting );
			?>
		</div><!-- .secondary-menu -->
		<div class="social-media">
			<?php
				$menu_setting = array (
					'theme_location' => 'social_menu',
				);
				wp_nav_menu( $menu_setting );
			?>
		</div><!-- .social-media -->
	</div><!-- .menus -->
</div><!-- #header-wrapper .col-auto -->

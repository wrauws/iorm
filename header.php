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
	<meta name="viewport" content="width=320, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.ico'; ?>">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/assets/images/apple-icon-touch.png'; ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<div id="navbarToggleMobileMenu" class="collapse navbar-collapse">
	<button class="navbar-button-back" type="button" data-toggle="collapse" data-target="#navbarToggleMobileMenu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrow-right.svg" />
	</button>
	<a href="/" class="navbar-logo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/uu-logo-en.svg" />
	</a>
	<nav class="mobile-menu">
		<?php
			$menu_setting = array (
				'theme_location' => 'primary_menu',
			);
			wp_nav_menu( $menu_setting );
		?><hr />
		<?php
			$menu_setting = array (
				'theme_location' => 'secondary_menu',
			);
			wp_nav_menu( $menu_setting );
		?><hr />
		<?php
			$menu_setting = array (
				'theme_location' => 'social_menu',
			);
			wp_nav_menu( $menu_setting );
		?><!-- .social-media -->
		<?php
			// $menu_setting = array (
			// 	'theme_location' => 'footer_menu',
			// 	);
			// 	wp_nav_menu( $menu_setting );
			//wp_nav_menu( $menu_setting );
		?><!-- .social-media -->

	</nav>
	<?php get_template_part('global-templates/social');?>

</div>

<div id="page"><!-- closes in the footer -->
<!-- start header -->

<?php 

if( is_front_page() && is_home() ) { 

// if( is_front_page() && is_home() || is_page(23) ) { 
	?>



		

		<?php //if ( get_header_image() ) { ?>

		    <div id="home-header" style="background-image:url(<?php header_image(); ?>);">
		    	<div class="home-header-logo">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/uu-logo.svg" />
				</div>
		    	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleMobileMenu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
			 	<span class="navbar-toggler-icon"></span>
			</button>
		        <!-- <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"> -->
			    <div class="container-fluid home-header-content">  	
			      	<h1><?php bloginfo('name'); ?></h1>
			      	<nav class="home-menu navbar navbar-collapse navbar-expand-lg">
				
					<?php
								$menu_setting = array (
									'theme_location' => 'primary_menu',
									
								);
								wp_nav_menu( $menu_setting );
							?>
					
					</nav>
				</div>

		    </div>

		<?php //} ?>
		


	
	<div class="container-fluid">	
		<?php get_template_part('global-templates/social');?>
		<nav class="home-menu-secondary navbar navbar-collapse navbar-expand-lg">
			
			<?php
						$menu_setting = array (
							'theme_location' => 'secondary_menu',
						);
						wp_nav_menu( $menu_setting );
					?>
			
		</nav>
	</div>	
	
	<div class="wrapper">

		<div class="container-fluid" id="content" tabindex="-1">

<?php } else { ?>

	<div id="header-wrapper">
		<div class="uu-bar">
			<a href="/">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/uu-logo.svg" />
			</a>
		</div><!-- .uu-bar -->

		<div class="menus">
			<?php //if(is_tax('rw_theme') || (is_single() && has_term('', 'rw_theme') ) ) { ?>
				<!-- <a href="#" data-toggle="collapse" data-target="#navbarToggleMobileMenu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">MENU</a> -->
				<nav class="main-menu">
					<?php
						$menu_setting = array (
							'theme_location' => 'primary_menu',
						);
						wp_nav_menu( $menu_setting );
					?>
				</nav><!-- .main-menu -->
				<hr />
				
			<?php //} else { ?>
			<nav class="secondary-menu">
				<?php
					$menu_setting = array (
						'theme_location' => 'secondary_menu',
					);
					wp_nav_menu( $menu_setting );
				?>
			</nav><!-- .secondary-menu -->
			<nav class="social-media">
				<?php
					$menu_setting = array (
						'theme_location' => 'social_menu',
					);
					//wp_nav_menu( $menu_setting );
				?>
			</nav><!-- .social-media -->
		<?php //} ?>
			<hr />
			<?php if(is_single()) { ?>
			<a href="javascript:history.go(-1)" title="Return to the previous page" class="menu-back" >Back</a>

			<?php } else { ?>
				<a href="/" title="Return to the homepage" class="menu-back" >Back</a>
			<?php } ?>
		</div><!-- .menus -->
	</div><!-- #header-wrapper .col-auto -->



<div class="wrapper" id="archive-wrapper">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleMobileMenu" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
			 	<span class="navbar-toggler-icon"></span>
	</button>
	<div id="site-title">
		<a href="/"><h1><?php bloginfo('name'); ?></h1></a>
	</div>

	<div class="container-fluid" id="content" tabindex="-1">


<?php } ?> 	


			

			
				<?php if(!is_home()) { ?>
					<a href="/">
				<div class="uu-logo-mobile d-block d-lg-none">
					
					
					
				</div><!-- .uu-logo-mobile -->
				</a>
				<?php } ?>

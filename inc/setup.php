<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'understrap_setup' );

if ( ! function_exists ( 'understrap_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function understrap_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on understrap, use a find and replace
		 * to change 'understrap' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary_menu' 		=> __('Primary Menu', 'understrap'),
			'secondary_menu' 	=> __('Secondary Menu', 'understrap'),
			'social_menu' 		=> __('Social Menu', 'understrap'),
			'footer_menu' 		=> __('Footer Menu', 'understrap'),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Check and setup theme default settings.
		understrap_setup_theme_default_settings();

	}
}


add_filter( 'excerpt_more', 'understrap_custom_excerpt_more' );

if ( ! function_exists( 'understrap_custom_excerpt_more' ) ) {
	/**
	 * Removes the ... from the excerpt read more link
	 *
	 * @param string $more The excerpt.
	 *
	 * @return string
	 */
	function understrap_custom_excerpt_more( $more ) {
		if ( ! is_admin() ) {
			$more = '';
		}
		return $more;
	}
}

add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

if ( ! function_exists( 'understrap_all_excerpts_get_more_link' ) ) {
	/**
	 * Adds a custom read more link to all excerpts, manually or automatically generated
	 *
	 * @param string $post_excerpt Posts's excerpt.
	 *
	 * @return string
	 */
	function understrap_all_excerpts_get_more_link( $post_excerpt ) {
		if ( ! is_admin() ) {
			//nothing here
		}
		return $post_excerpt;
	}
}


function cptui_register_my_cpts_events() {

	/**
	 * Post Type: Events.
	 */

	$labels = [
		"name" => __( "Events", "understrap" ),
		"singular_name" => __( "Event", "understrap" ),
		"menu_name" => __( "Events", "understrap" ),
		"all_items" => __( "All Events", "understrap" ),
		"add_new" => __( "Add new", "understrap" ),
		"add_new_item" => __( "Add new Event", "understrap" ),
		"edit_item" => __( "Edit Event", "understrap" ),
		"new_item" => __( "New Event", "understrap" ),
		"view_item" => __( "View Event", "understrap" ),
		"view_items" => __( "View Events", "understrap" ),
		"search_items" => __( "Search Events", "understrap" ),
		"not_found" => __( "No Events found", "understrap" ),
		"not_found_in_trash" => __( "No Events found in trash", "understrap" ),
		"parent" => __( "Parent Event:", "understrap" ),
		"featured_image" => __( "Featured image for this Event", "understrap" ),
		"set_featured_image" => __( "Set featured image for this Event", "understrap" ),
		"remove_featured_image" => __( "Remove featured image for this Event", "understrap" ),
		"use_featured_image" => __( "Use as featured image for this Event", "understrap" ),
		"archives" => __( "Event archives", "understrap" ),
		"insert_into_item" => __( "Insert into Event", "understrap" ),
		"uploaded_to_this_item" => __( "Upload to this Event", "understrap" ),
		"filter_items_list" => __( "Filter Events list", "understrap" ),
		"items_list_navigation" => __( "Events list navigation", "understrap" ),
		"items_list" => __( "Events list", "understrap" ),
		"attributes" => __( "Events attributes", "understrap" ),
		"name_admin_bar" => __( "Event", "understrap" ),
		"item_published" => __( "Event published", "understrap" ),
		"item_published_privately" => __( "Event published privately.", "understrap" ),
		"item_reverted_to_draft" => __( "Event reverted to draft.", "understrap" ),
		"item_scheduled" => __( "Event scheduled", "understrap" ),
		"item_updated" => __( "Event updated.", "understrap" ),
		"parent_item_colon" => __( "Parent Event:", "understrap" ),
	];

	$args = [
		"label" => __( "Events", "understrap" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "events",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "event", "with_front" => false ],
		"query_var" => true,
		"menu_position" => 5,
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
		"taxonomies" => [ "rw_theme", "event_category" ],
	];

	register_post_type( "events", $args );
}

add_action( 'init', 'cptui_register_my_cpts_events' );

<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/custom-header.php',                   // Custom header file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


function irw_modify_main_query( $query ) {
    $todaydate = date('Ymd');

    if ( ! is_admin() && $query->is_tax( 'rw_theme' ) ) {
        // $query->set( 'posts_per_page', 20 );
      	//$query->set( 'post_type', 'post' );
        $query->set( 'posts_per_page', -1 );
  
  
    }
    // if ( ! is_admin() && $query->is_post_type_archive( 'agenda' ) ) {
    //     $query->set( 'order', 'ASC' );
    //     $query->set( 'orderby', 'meta_value' );
    //     $query->set( 'meta_key', 'agenda_datum' );
    //     $query->set( 'meta_query', 
    //         array(
    //             'key' => 'agenda_datum',
    //             'value' => $todaydate,
    //             'compare' => '>=',   
    //         )
    //      );
    // }
    //https://casabona.org/2015/03/fix-wp_nav_menu-custom-type-archives-wordpress/
    // if ( $query->get( 'post_type' ) === 'nav_menu_item' ) {
    //     $query->set( 'tax_query', '' );
    //     $query->set( 'meta_key', '' );
    //     $query->set( 'orderby', '' );
    // }
}
add_filter( 'pre_get_posts', 'irw_modify_main_query' );


function my_custom_order_users_by_id( $query ) {
        
   if( is_admin() ) {
      return;
   }

   $query->query_vars['role__not_in'] = 'administrator';
   $query->query_vars['meta_key'] = 'author_order';
   $query->query_vars['orderby'] = 'meta_value_num';
   $query->query_vars['order']   = 'ASC';

   // We need to remember to return the altered query.
   return $query;
}
// Lets apply our function to hook.
//add_action( 'pre_get_users', 'my_custom_order_users_by_id' );

// set cpt as parent ietm for singsle cpt's
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
    
    function add_current_nav_class($classes, $item) {
        
        if(is_home() || is_archive()) {
          return $classes;
        }

        // Getting the current post details
        global $post;

        $terms = get_the_terms( $post->ID, 'rw_theme' );
        
        
        
        // Getting the post type of the current post
        $current_post_type = get_post_type_object(get_post_type($post->ID));
        $current_post_type_slug = $current_post_type->rewrite['slug'];
       
        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));
        
        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (strpos($menu_slug,$current_post_type_slug) !== false) {
        
           $classes[] = 'current-menu-item';
        
        }
        if($terms) {
          foreach ($terms as $term ) {
            //print_r($term);
            $current_term_slug = $term->slug;
            if (strpos($menu_slug,$current_term_slug) !== false) {
          
              $classes[] = 'current-menu-item';
          
            }
          }
        }
          
        // Return the corrected set of classes to be added to the menu item
        return $classes;
    
    }
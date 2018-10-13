<?php

/*
 * Theme Customization
 * 
 * @package Scratch
 * @author Mary Weise
 * @link https://marydoesdev.com
 * @copyright Copyright (c) 2018, Mary Weise
 * @license GPL-2.0+
 */

// Load child theme text domin
load_child_theme_textdomain( 'scratch' );

// Start the engine
add_action( 'genesis_setup', 'scratch_setup', 15 );

/*
 * Theme setup.
 * 
 * Attach all of the site-wide functions to correct hooks and filters. All 
 * the functions themselves are defined below this setup function.
 * 
 * @since 1.0.0
 */
function scratch_setup(){
    
    // Define theme constants
    define( 'CHILD_THEME_NAME', 'Scratch' );
    define( 'CHILD_THEME_URL', 'https://github.com/maryjweise/genesis-scratch' );
    define( 'CHILD_THEME_VERSION', '1.0.0' );
    
    // Add HTML5 markup structure
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    
    // Add viewport meta tag for mobile browsers
    add_theme_support( 'genesis-responsive-viewport' );
    
    // Add theme support for accessibility
    add_theme_support(
        'genesis-accessibility',
        array(
                '404-page',
                'drop-down-menu',
                'headings',
                'rems',
                'search-form',
                'skip-links',
        )
    );
    
    // Add theme support for footer widgets
    add_theme_support( 'genesis-footer-widgets', 2);
    
    // Add theme support for custom logo
    add_theme_support( 'custom-logo' );
    
    // Unregister layouts that use secondary sidebar
    genesis_unregister_layout( 'content-sidebar-sidebar' );
    genesis_unregister_layout( 'sidebar-content-sidebar' );
    genesis_unregister_layout( 'sidebar-sidebar-content' );
    
    // Unregister secondary sidebar
    unregister_sidebar( 'sidebar-alt' );
    
    // Add theme widget areas
    include_once( get_stylesheet_directory() . '/inc/widget-areas.php' );
}

// Add Google fonts stylesheet
add_action( 'wp_enqueue_scripts', 'scratch_enqueue_styles' );
function scratch_enqueue_styles() {
    
    wp_enqueue_style( 'google-fonts' , '//fonts.googleapis.com/css?family=Arimo:400,400i,700,700i|Yellowtail' );
}

// Enqueue custom js file 
add_action( 'wp_enqueue_scripts', 'scratch_enqueue_scripts' );
function scratch_enqueue_scripts(){
    if(is_home()){
        wp_enqueue_script( 'scratch-home' , get_stylesheet_directory_uri() . '/js/scratch-home.js', array('jquery'), '', true );   
    }
    wp_enqueue_script( 'scratch-functions', get_stylesheet_directory_uri() . '/js/functions.js', array('jquery'), '20181009', true );
}

// Add logo areas in site header
add_action ( 'genesis_site_title', 'scratch_custom_logo' );

function scratch_custom_logo() {
    if(the_custom_logo()): 
        the_custom_logo;
    endif;
}

//function for Woocommerce output
function woocommerce_setup_genesis() {
  woocommerce_content();
}

//* Declare WooCommerce Support
add_theme_support( 'woocommerce' );

////add genesis theme settings on Woocommerce products
//add_post_type_support('product', 
//        array(
//            'genesis-layouts',
//            'genesis-seo'
//        )
//    );

//set all woocommerce pages to full width
function scratch_wc_layout(){
    if( is_page( array( 'cart', 'checkout' )) || is_shop() || get_post_type() == 'product'){
        return 'full-width-content';
    }
}
add_filter( 'genesis_site_layout', 'scratch_wc_layout');

//Change copyright 
function scratch_footer_creds_text() {
    $copyright = '<div class="creds"><p>&copy; ' . date('Y') . ' <a href="https://candiedfabrics.com/" target="_blank">Candied Fabrics</a> | Designed &amp; Built By <a href="https://marydoesdev.com/" target="_blank">Mary Does Dev</a></p></div>';
    return $copyright;
    
}
add_filter('genesis_footer_creds_text' , 'scratch_footer_creds_text' );

//* Make Font Awesome available
add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
}

/**
 * Place a cart icon with number of items and total cost in the menu bar.
 *
 * Source: http://wordpress.org/plugins/woocommerce-menu-bar-cart/
 */
add_filter('wp_nav_menu_items','sk_wcmenucart', 10, 2);
function sk_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'scratch');
		$start_shopping = __('Start shopping', 'scratch');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'scratch'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// if ( $cart_contents_count > 0 ) {
			if ($cart_contents_count == 0) {
				$menu_item = '<li class="menu-item"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
			} else {
				$menu_item = '<li class="menu-item"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			}

			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';

			$menu_item .= $cart_contents.' - '. $cart_total;
			$menu_item .= '</a></li>';
		// Uncomment the line below to hide nav menu cart item when there are no items in the cart
		// }
		echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}

/**
 * Register menu locations with Genesis
 *
 * @author Reasons to Use Genesis
 * @link http://reasonstousegenesis.com/genesis-menus/
 */
add_theme_support( 'genesis-menus', array(
	'primary'   => __( 'Primary Navigation Menu', 'genesis' ),
	'social'    => __( 'Footer Social Menu', 'genesis' ),
	'footer'    => __( 'Footer Navigation Menu', 'genesis' )
) );

// Output social and footer menus in footer file

add_action('genesis_footer', 'scratch_add_footer_menus');

function scratch_add_footer_menus() {
    genesis_nav_menu( array( 'theme_location' => 'social' ) );
    genesis_nav_menu( array( 'theme_location' => 'footer' ) );
}


/**
 * Load SVG icon functions.
 */
require get_stylesheet_directory() . '/inc/icon-functions.php';

/**********************************
*
* Integrate WooCommerce with Genesis.
*
* Unhook WooCommerce wrappers and
* Replace with Genesis wrappers.
*
* Reference Genesis file:
* genesis/lib/framework.php
*
* @author AlphaBlossom / Tony Eppright
* @link http://www.alphablossom.com
*
**********************************/
// Add WooCommerce support for Genesis layouts (sidebar, full-width, etc) - Thank you Kelly Murray/David Wang
add_post_type_support( 'product', array( 'genesis-layouts', 'genesis-seo' ) );
// Unhook WooCommerce Sidebar - use Genesis Sidebars instead
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// Unhook WooCommerce wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// Hook new functions with Genesis wrappers
add_action( 'woocommerce_before_main_content', 'scratch_my_theme_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'scratch_my_theme_wrapper_end', 10 );
// Add opening wrapper before WooCommerce loop
function scratch_my_theme_wrapper_start() {
 do_action( 'genesis_before_content_sidebar_wrap' );
 genesis_markup( array(
 'html5' => '<div %s>',
 'xhtml' => '<div id="content-sidebar-wrap">',
 'context' => 'content-sidebar-wrap',
 ) );
 do_action( 'genesis_before_content' );
 genesis_markup( array(
 'html5' => '<main %s>',
 'xhtml' => '<div id="content" class="hfeed">',
 'context' => 'content',
 ) );
 do_action( 'genesis_before_loop' );
}
/* Add closing wrapper after WooCommerce loop */
function scratch_my_theme_wrapper_end() {
 do_action( 'genesis_after_loop' );
 genesis_markup( array(
 'html5' => '</main>', //* end .content
 'xhtml' => '</div>', //* end #content
 ) );
 do_action( 'genesis_after_content' );
 echo '</div>'; //* end .content-sidebar-wrap or #content-sidebar-wrap
 do_action( 'genesis_after_content_sidebar_wrap' );
}
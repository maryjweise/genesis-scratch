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
    add_theme_support( 'genesis-footer-widgets', 3);
    
    // Add theme support for custom logo
    add_theme_support( 'custom-logo' );
    
    // Unregister layouts that use secondary sidebar
    genesis_unregister_layout( 'content-sidebar-sidebar' );
    genesis_unregister_layout( 'sidebar-content-sidebar' );
    genesis_unregister_layout( 'sidebar-sidebar-content' );
    
    // Unregister secondary sidebar
    unregister_sidebar( 'sidebar-alt' );
    
    // Add theme widget areas
    include_once( get_stylesheet_directory() . '/includes/widget-areas.php' );
}

// Add Google fonts stylesheet
add_action( 'wp_enqueue_scripts', 'scratch_enqueue_styles' );
function scratch_enqueue_styles() {
    
    wp_enqueue_style( 'google-fonts' , '//fonts.googleapis.com/css?family=Arimo:400,400i,700,700i|Yellowtail' );
}

// Add logo areas in site header
add_action ( 'genesis_site_title', 'scratch_custom_logo' );

function scratch_custom_logo() {
    if(the_custom_logo()): 
        the_custom_logo;
    endif;
}
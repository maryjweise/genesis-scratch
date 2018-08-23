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
add_action( 'genesis_setup', 'scratch_setup' );

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
    
    add_theme_support() {
        
    }
    
}
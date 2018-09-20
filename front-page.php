<?php

/*
 * Front page template
 * 
 * @package Scratch
 * @author Mary Weise
 * @link https://marydoesdev.com
 * @copyright Copyright (c) 2018, Mary Weise
 * @license GPL-2.0+
 */

add_action( 'genesis_meta', 'scratch_home_page_setup' );
// Remove default post loop so I can still take advantage of the content-sidebar structure
    remove_action('genesis_loop', 'genesis_do_loop');
    
    // Remove default sidebar so I can still take advantage of the content-sidebar structure
    remove_action( 'genesis_after_content', 'genesis_get_sidebar' );

function scratch_home_page_setup(){
    
    $home_sidebars = array(
        'home_slider'      => is_active_sidebar( 'home-slider' ),
        'home_shop'    => is_active_sidebar( 'home-shop' ),
        'home_blog'    => is_active_sidebar( 'home-blog' ),
        'home_sidebar'    => is_active_sidebar( 'home-sidebar' ),
        'home_about'    => is_active_sidebar( 'home-about' ),
        'home_optin'    => is_active_sidebar( 'home-optin' ),
    );
    // Return early if no sidebars are active
    if ( !in_array( true, $home_sidebars ) ) {
        return;
    }
    
    // Add slider area if "Home Slider" widget area is active
    if ( $home_sidebars['home_slider'] ) {
        add_action( 'genesis_after_header', 'scratch_add_home_slider',11 );
    }
    
    // Add Shop section if "Home Shop" widget area is active
    if ( $home_sidebars['home_shop'] ) {
        add_action( 'genesis_after_header', 'scratch_add_home_shop',12 );

    }
    // Add Blog section if "Home Blog" widget area is active
    if ( $home_sidebars['home_blog'] ) {
        add_action( 'genesis_loop', 'scratch_add_home_blog',12 );

    }
    // Add sidebar section if "Home Sidebar" widget area is active
    if ( $home_sidebars['home_sidebar'] ) {
        add_action( 'genesis_after_content', 'scratch_add_home_sidebar',12 );

    }
    // Add About section if "Home About" widget area is active
    if ( $home_sidebars['home_about'] ) {
        add_action( 'genesis_after_content_sidebar_wrap', 'scratch_add_home_about',11 );

    }
    // Add Optin section if "Home Optin" widget area is active
    if ( $home_sidebars['home_optin'] ) {
        add_action( 'genesis_after_content_sidebar_wrap', 'scratch_add_home_optin',12 );

    }
    
    
}
/*
 * Display content for the "Home Slider" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_slider() {
    genesis_widget_area( 'home-slider',
            array(
                'before' => '<div class="home-slider"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}

/*
 * Display content for the "Home Shop" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_shop() {
    genesis_widget_area( 'home-shop',
            array(
                'before' => '<div class="home-shop"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}
/*
 * Display content for the "Home Blog" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_blog() {
    genesis_widget_area( 'home-blog',
            array(
                'before' => '<div class="home-blog"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}
/*
 * Display content for the "Home Sidebar" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_sidebar() {
    genesis_widget_area( 'home-sidebar',
            array(
                'before' => '<div class="home-sidebar"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}
/*
 * Display content for the "Home About" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_about() {
    genesis_widget_area( 'home-about',
            array(
                'before' => '<div class="home-about"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}
/*
 * Display content for the "Home Optin" section.
 * 
 * @since 1.0.0
 */
function scratch_add_home_optin() {
    genesis_widget_area( 'home-optin',
            array(
                'before' => '<div class="home-optin"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}

genesis();
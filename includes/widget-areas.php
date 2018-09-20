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

//* Register front page widget areas
    genesis_register_sidebar( array(
            'id'            => 'home-slider',
            'name'          => __( 'Home Slider', 'scratch' ),
            'description'   => __( 'Display a Slider on the front page', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'home-shop',
            'name'          => __( 'Home Shop', 'scratch' ),
            'description'   => __( 'Display shop categories on the front page', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'home-blog',
            'name'          => __( 'Home Blog', 'scratch' ),
            'description'   => __( 'Display most recent blog post on front page with RSS widget', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'home-sidebar',
            'name'          => __( 'Home Sidebar', 'scratch' ),
            'description'   => __( 'Short sidebar to display on front page', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'home-about',
            'name'          => __( 'Home About', 'scratch' ),
            'description'   => __( 'Display short about section on front page', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'home-optin',
            'name'          => __( 'Home Optin', 'scratch' ),
            'description'   => __( 'Display full width optin on front page', 'scratch' ),
    ) );

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
            'id'            => 'home-welcome',
            'name'          => __( 'Home Welcome', 'scratch' ),
            'description'   => __( 'This is a home widget area that will show on the front page', 'scratch' ),
    ) );
    genesis_register_sidebar( array(
            'id'            => 'call-to-action',
            'name'          => __( 'Call to Action', 'scratch' ),
            'description'   => __( 'This is a call to action widget area that will show on the front page', 'scratch' ),
    ) );

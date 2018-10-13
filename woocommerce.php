<?php
/**
 * WooCommerce Template
 * 
 * Template used for all WooCommerce views for your site
 *
 */
if(is_active_sidebar('shop-sidebar') && is_archive()){
    add_action( 'genesis_before_content', 'scratch_add_shop_sidebar',12 );
} 

/*
 * Display content for the "Shop Sidebar" section.
 * 
 * @since 1.0.0
 */
function scratch_add_shop_sidebar() {
    genesis_widget_area( 'shop-sidebar',
            array(
                'before' => '<div class="shop-sidebar"><div class="wrap">',
                'after' => '</div></div>',
            )
        );
}

//* Remove standard post content output
remove_action( 'genesis_loop', 'genesis_do_loop');
 
//* Add WooCommerce content output
add_action( 'genesis_loop', 'woocommerce_setup_genesis' );

remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 ); 

remove_action('genesis_before_loop', 'genesis_do_breadcrumbs');

add_action('genesis_before_loop', 'scratch_woocommerce_breadcrumbs');

function scratch_woocommerce_breadcrumbs() {
    $home_icon = scratch_get_svg(array( 'icon' => 'home', 'fallback' => true));
    $args = array(
        'delimiter' => ' &#187; ',
    );
    woocommerce_breadcrumb($args);
}
genesis();
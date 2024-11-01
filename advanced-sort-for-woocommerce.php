<?php
/**
 * Plugin Name: Advanced Sort for WooCommerce
 * Description: Advanced Woocommerce Sorting options.
 * Plugin URI: #
 * Author: AH Website
 * Version: 1.1
 * Author URI: https://ahwebsite.com/
 */
 
// Woocommerce Sorting Options A-Z
add_filter( 'woocommerce_get_catalog_ordering_args', 'asfw_az_woocommerce_get_catalog_ordering_args' );

function asfw_az_woocommerce_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

    if ( 'alphabetical' == $orderby_value ) {
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
    }

    return $args;
}

add_filter( 'woocommerce_default_catalog_orderby_options', 'asfw_az_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'asfw_az_woocommerce_catalog_orderby' );

function asfw_az_woocommerce_catalog_orderby( $sortby ) {
    $sortby['alphabetical'] = __( 'Sort by Alphabetical' );
    return $sortby;
}

// Woocommerce Sorting Options In Stock - Out of Stock
add_filter( 'woocommerce_get_catalog_ordering_args', 'asfw_instockoutstock_woocommerce_get_catalog_ordering_args' );

function asfw_instockoutstock_woocommerce_get_catalog_ordering_args( $args ) {
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

    if ( 'stockstatus' == $orderby_value ) {
		$args['orderby'] = 'meta_value';
		$args['meta_key'] = '_stock_status';
    }

    return $args;
}

add_filter( 'woocommerce_default_catalog_orderby_options', 'asfw_instockoutstock_woocommerce_catalog_orderby' );
add_filter( 'woocommerce_catalog_orderby', 'asfw_instockoutstock_woocommerce_catalog_orderby' );

function asfw_instockoutstock_woocommerce_catalog_orderby( $sortby ) {
    $sortby['stockstatus'] = __( 'Sort by In Stock - Out of Stock' );
    return $sortby;
}
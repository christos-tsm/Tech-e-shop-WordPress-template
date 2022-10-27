<?php

/**
 * ACF Options
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}

//Remove Gutenberg Block Library CSS from loading on the frontend
/* Remove WooCommerce block styles */
function wphelp_remove_block_styles_woo()
{
    wp_deregister_style('wc-blocks-style');
    wp_dequeue_style('wc-blocks-style');
}
add_action('enqueue_block_assets', 'wphelp_remove_block_styles_woo');

//Remove Gutenberg Block Library CSS from loading on the frontend
function n22_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-blocks-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'n22_remove_wp_block_library_css', 100);


/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */

add_action('wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999);

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style()
{
    wp_dequeue_style('storefront-style');
    wp_dequeue_style('storefront-woocommerce-style');
}

/**
 * @snippet       Edit Image Sizes @ Storefront Theme
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 6
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_filter('storefront_woocommerce_args', 'bbloomer_resize_storefront_images');

function bbloomer_resize_storefront_images($args)
{
    $args['single_image_width'] = 1000;
    $args['thumbnail_image_width'] = 273;
    return $args;
}

/**
 * Change exceprt length
 */
function my_excerpt_length($length)
{
    return 10;
}
add_filter('excerpt_length', 'my_excerpt_length');

/**
 * Change exceprt dots
 */
function new_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

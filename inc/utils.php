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
    $args['single_image_width'] = 600;
    $args['thumbnail_image_width'] = 320;
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

/**
 * Add link to product title
 */
// define the woocommerce_shop_loop_item_title callback 
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 2);

if (!function_exists('codeless_woocommerce_template_loop_product_title')) {
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function codeless_woocommerce_template_loop_product_title()
    {
        global $product;

        $link = apply_filters('woocommerce_template_loop_product_title', get_the_permalink(), $product);

        echo '<a href="' . esc_url($link) . '"><h2 class="' . esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')) . '">' . get_the_title() . '</h2></a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
};

// add the action 
add_action('woocommerce_shop_loop_item_title', 'codeless_woocommerce_template_loop_product_title', 10, 2);

/**
 * @snippet       Plus Minus Quantity Buttons @ WooCommerce Product Page & Cart
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// -------------
// 1. Show plus minus buttons

add_action('woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus');

function bbloomer_display_quantity_plus()
{
    echo '<button type="button" class="plus">+</button>';
}

add_action('woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus');

function bbloomer_display_quantity_minus()
{
    echo '<button type="button" class="minus">-</button>';
}

// -------------
// 2. Trigger update quantity script

add_action('wp_footer', 'bbloomer_add_cart_quantity_plus_minus');

function bbloomer_add_cart_quantity_plus_minus()
{

    if (!is_product() && !is_cart()) return;

    wc_enqueue_js("   
           
      $(document).on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
 
      });
        
   ");
}

/**
 * Enable ajax add to cart for WoCommerce products
 */
function n22_wc_single_ajax_add_to_cart()
{
    if (function_exists('is_product') && is_product()) {
        wp_enqueue_script('ajax-add-to-cart', get_stylesheet_directory_uri() . '/js/ajax-add-to-cart.js', array('jquery'), null, true);
    }
}

add_action('wp_enqueue_scripts', 'n22_wc_single_ajax_add_to_cart');

<?php

/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but()
{
    ob_start();

    $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
    $cart_url = wc_get_cart_url();  // Set Cart URL


?>
    <!-- <div class="count-wrapper"> -->

    <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="<?php _e('Καλάθι', 'storefront'); ?>">

        <?php if ($cart_count > 0) { ?>

            <span class="cart-contents-count"><?php echo $cart_count; ?></span>

        <?php } ?>

    </a>

    <!-- </div> -->

<?php

    return ob_get_clean();
}

add_shortcode('woo_cart_but', 'woo_cart_but');



/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count($fragments)
{
    ob_start();
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
?>
    <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e('View your shopping cart'); ?>">
        <?php
        if ($cart_count > 0) {
        ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
    </a>

    <?php

    $fragments['a.cart-contents'] = ob_get_clean();

    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'woo_cart_but_count');


/**
 * echo do_shortcode('[yith_wcwl_items_count]'); 
 */
if (defined('YITH_WCWL') && !function_exists('yith_wcwl_get_items_count')) {
    function yith_wcwl_get_items_count()
    {
        ob_start();
    ?>
        <span class="yith-wcwl-items-count">
            <i class="yith-wcwl-icon">
                <?php echo esc_html(yith_wcwl_count_all_products()); ?>
            </i>
        </span>
    <?php
        return ob_get_clean();
    }
    add_shortcode('yith_wcwl_items_count', 'yith_wcwl_get_items_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_ajax_update_count')) {
    function yith_wcwl_ajax_update_count()
    {
        wp_send_json(array(
            'count' => yith_wcwl_count_all_products()
        ));
    }
    add_action('wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
    add_action('wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count');
}

if (defined('YITH_WCWL') && !function_exists('yith_wcwl_enqueue_custom_script')) {
    function yith_wcwl_enqueue_custom_script()
    {
        wp_add_inline_script(
            'jquery-yith-wcwl',
            "
		   jQuery( function( $ ) {
			 $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
			   $.get( yith_wcwl_l10n.ajax_url, {
				 action: 'yith_wcwl_update_wishlist_count'
			   }, function( data ) {
				 $('.yith-wcwl-items-count').html( data.count );
			   } );
			 } );
		   } );
		 "
        );
    }
    add_action('wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20);
}


if (!function_exists('storefront_cart_link')) {
    function storefront_cart_link()
    {
    ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('View your shopping cart', 'storefront'); ?>">
            <?php /* translators: %d: number of items in cart */ ?>
            <?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?> <span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
        </a>
<?php
    }
}

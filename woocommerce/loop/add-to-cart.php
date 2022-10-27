<?php

/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
	exit;
}

global $product;

echo apply_filters(
	'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
	sprintf(
		// '<a href="%s" data-quantity="%s" class="%s" %s>%s </a>',
		'<a href="%s" data-quantity="%s" class="%s" %s>
			<svg xmlns="http://www.w3.org/2000/svg" width="25.41" height="24.346" viewBox="0 0 25.41 24.346">
				<g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(-0.5 -0.5)">
				<path id="Path_6" data-name="Path 6" d="M14.128,31.064A1.064,1.064,0,1,1,13.064,30,1.064,1.064,0,0,1,14.128,31.064Z" transform="translate(-3.051 -8.282)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
				<path id="Path_7" data-name="Path 7" d="M30.628,31.064A1.064,1.064,0,1,1,29.564,30,1.064,1.064,0,0,1,30.628,31.064Z" transform="translate(-7.846 -8.282)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
				<path id="Path_8" data-name="Path 8" d="M1.5,1.5H5.756L8.608,15.748a2.128,2.128,0,0,0,2.128,1.713H21.079a2.128,2.128,0,0,0,2.128-1.713l1.7-8.928H6.82" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
				</g>
			</svg>
		</a>',
		esc_url($product->add_to_cart_url()),
		esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
		esc_attr(isset($args['class']) ? $args['class'] : 'button'),
		isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
		esc_html($product->add_to_cart_text())
	),
	$product,
	$args
);

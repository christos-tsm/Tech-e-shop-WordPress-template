<?php /*

  This file is part of a child theme called Net22.
  Functions in this file will be loaded before the parent theme's functions.
  For more information, please read
  https://developer.wordpress.org/themes/advanced-topics/child-themes/

*/

// this code loads the parent's stylesheet (leave it in place unless you know what you're doing)

function your_theme_enqueue_styles()
{

  $parent_style = 'parent-style';

  // wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

  wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array($parent_style), wp_get_theme()->get('Version'));
  wp_enqueue_style('main-style',  get_stylesheet_directory_uri() . '/styles/main.css', array(), wp_get_theme()->get('Version'));
  wp_enqueue_style('slick-style',  'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null);


  wp_enqueue_script('jquery');
  wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), null, true);
  wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array(), null, true);
  // wp_enqueue_script('ajax-add-to-cart', get_stylesheet_directory_uri() . '/js/ajax-add-to-cart.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'your_theme_enqueue_styles');

/*  Add your own functions below this line.
    ======================================== */

require_once get_stylesheet_directory() . '/inc/utils.php';
require_once get_stylesheet_directory() . '/inc/woo-ajax-cart-wishlist.php';

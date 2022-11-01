<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>

<!doctype html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php $logo = get_field('logo', 'option'); ?>

	<div class="site-overlay"></div>

	<?php get_template_part('template-parts/menu'); ?>

	<header class="site-header__container">

		<div class="topbar__container">

			<div class="topbar">

				<div class="topbar__text">

					<p><?php the_field('topbar_text1', 'option'); ?></p>

				</div>

				<div class="topbar__text topbar__text--center">

					<p><?php the_field('topbar_text2', 'option'); ?></p>

				</div>

				<?php if (have_rows('tels', 'option')) : ?>

					<?php while (have_rows('tels', 'option')) : the_row(); ?>

						<?php if (get_row_index() <= 1) : ?>

							<address>

								<a href="tel:<?php the_sub_field('tel'); ?>">

									<span class="icon icon--small">

										<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/phone.svg') ?>

									</span>

									<?php the_sub_field('tel'); ?>

								</a>

							</address>

						<?php endif; ?>

					<?php endwhile; ?>

				<?php endif; ?>

			</div>

		</div>

		<div class="site-header__content">

			<div class="site-header__logo">

				<a aria-label="Home link" href="<?php echo home_url(); ?>">

					<img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo bloginfo('name'); ?>">

				</a>

			</div>

			<nav class="site-header__menu">

				<ul class="menu__ul">

					<li class="menu__item menu__item--categories">

						<a href="javascript:void(0);" id="products-burger">

							<span class="icon icon--small">

								<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/burger.svg'); ?>

							</span>


							<?php _e('Προϊόντα', 'storefront'); ?>

						</a>

					</li>

					<li class="menu__item menu__item--single">

						<a href="#!">

							<?php _e('Deals', 'storefront'); ?>

						</a>

					</li>

					<li class="menu__item menu__item--single">

						<a href="#!">

							<?php _e('Υπηρεσίες', 'storefront'); ?>

						</a>

					</li>

				</ul>

			</nav>

			<div class="site-header__search">

				<?php echo do_shortcode('[fibosearch]'); ?>

			</div>

			<div class="site-header__icons">

				<a href="<?php echo get_permalink(119); ?>" class="site-header__wishlist">

					<span class="icon icon--small">

						<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/heart.svg'); ?>

						<?php echo do_shortcode("[yith_wcwl_items_count]"); ?>

					</span>

				</a>

				<a href="<?php echo get_permalink(9); ?>" class="site-header__account">

					<span class="icon icon--small">

						<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/user.svg'); ?>

					</span>

				</a>

				<div class="site-header__cart">

					<span class="icon icon--small">

						<?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/cart.svg'); ?>

					</span>

					<?php echo do_shortcode("[woo_cart_but]"); ?>

				</div>

			</div>

		</div>

	</header>
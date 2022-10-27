<?php

/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

<main id="main" class="site-main">

    <?php get_template_part('template-parts/home', 'intro'); ?>

    <?php if (have_rows('icon_boxes')) : ?>

        <section class="container icon-boxes">

            <?php while (have_rows('icon_boxes')) : the_row(); ?>

                <?php $icon = get_sub_field('icon'); ?>

                <div class="icon-boxes__single">

                    <div class="icon-boxes__icon">

                        <img src="<?php echo esc_url($icon['url']) ?>" alt="<?php the_sub_field('title'); ?>">

                    </div>

                    <div class="icon-boxes__content">

                        <h4><?php the_sub_field('title'); ?></h4>

                        <div class="icon-boxes__content-text">

                            <?php the_sub_field('text'); ?>

                        </div>

                    </div>

                </div>

            <?php endwhile; ?>

        </section>

    <?php endif; ?>

    <?php if (have_rows('products')) : ?>

        <?php while (have_rows('products')) : the_row(); ?>

            <?php get_template_part('template-parts/home', 'products'); ?>

        <?php endwhile; ?>

    <?php endif; ?>

    <?php if (have_rows('banners_after_products')) : ?>

        <section class="container banners__container">

            <?php while (have_rows('banners_after_products')) : the_row(); ?>

                <?php $image = get_sub_field('image'); ?>

                <?php $link = get_sub_field('link'); ?>

                <div class="banners__single">

                    <div class="overlay"></div>

                    <a aria-label="Link to shop" href="<?php echo esc_url($link['url']); ?>">

                        <img src="<?php echo esc_url($image['url']) ?>" alt="<?php the_sub_field('title'); ?>">

                    </a>

                    <div class="banners__single-content">

                        <h5><?php the_sub_field('subtitle'); ?></h5>

                        <h4><?php the_sub_field('title'); ?></h4>

                        <a href="<?php echo esc_url($link['url']); ?>" class="cta cta--secondary"><?php echo $link['title']; ?></a>

                    </div>

                </div>

            <?php endwhile; ?>

        </section>

    <?php endif; ?>

    <?php get_template_part('template-parts/product', 'slider'); ?>

    <?php get_template_part('template-parts/latest', 'posts'); ?>

</main><!-- #main -->

<?php
get_footer();

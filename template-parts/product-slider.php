<?php

if (have_rows('products_slider')) :

    while (have_rows('products_slider')) : the_row();

        $products_number = get_sub_field('products_number');

    endwhile;

else :

    $products_number = 12;

endif;

$args = array(
    'post_type' => 'product',
    'posts_per_page' => intval($products_number),
);

$query = new WP_Query($args);
?>

<?php if (have_rows('products_slider')) : ?>

    <?php while (have_rows('products_slider')) : the_row(); ?>

        <section class="container products__container">

            <h4 class="section-subtitle"><?php the_sub_field('subtitle'); ?></h4>

            <h3 class="section-title"><?php the_sub_field('title') ?></h3>

            <div class="products-slider__container">

                <?php if ($query->have_posts()) : ?>

                    <div class="products-slider">

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <?php wc_get_template_part('content', 'product'); ?>

                        <?php endwhile; ?>

                    </div>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

                <span id="products-slider-prev" class="chevron chevron-prev"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-left.svg') ?></span>

                <span id="products-slider-next" class="chevron chevron-next"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-right.svg') ?></span>

            </div>

        </section>

    <?php endwhile; ?>

<?php endif; ?>
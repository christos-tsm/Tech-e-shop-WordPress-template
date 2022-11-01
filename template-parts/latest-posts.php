<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8
);

$query = new WP_Query($args);
?>

<section class="container latest-posts__container">

    <h4 class="section-subtitle"><?php _e('Newest electronics', 'storefront'); ?></h4>

    <h3 class="section-title"><?php _e('Our Latest Articles', 'storefront'); ?></h3>

    <div class="posts-slider__container">

        <div class="latest-posts">

            <?php if ($query->have_posts()) : ?>

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <?php get_template_part('template-parts/blog', 'post-single'); ?>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

        <span id="posts-slider-prev" class="chevron chevron-prev"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-left.svg') ?></span>

        <span id="posts-slider-next" class="chevron chevron-next"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-right.svg') ?></span>

    </div>

</section>
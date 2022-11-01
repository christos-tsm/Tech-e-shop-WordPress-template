<?php

/**
 * Template Name: Blog
 */
get_header();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
);

$query = new WP_Query($args);
?>
<main id="main" class="site-main">

    <section class="blog__container container default-page__container">

        <div class="entry-header">

            <h1 class="entry-title"><?php the_title(); ?></h1>

        </div>

        <?php if ($query->have_posts()) : ?>

            <div class="blog__grid">

                <?php while ($query->have_posts()) : $query->the_post(); ?>

                    <?php get_template_part('template-parts/blog', 'post-single'); ?>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>


    </section>

</main>


<?php get_footer(); ?>
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

                    <?php $category = get_the_category(); ?>

                    <article id="post-<?php echo get_the_ID(); ?>" class="post-single">

                        <header class="post-single__header">

                            <a class="post-single__thumbnail" aria-label="Link to <?php the_title(); ?>" href="<?php the_permalink(); ?>">

                                <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">

                            </a>

                            <h5 class="post-single__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                            <p class="post-single__date"><time datetime="<?php echo get_the_date('j F Y') ?>"><?php echo get_the_date('j F Y') ?></time> &nbsp; / &nbsp; <?php echo $category[0]->name ?></p>

                        </header>

                        <div class="post-single__excerpt">

                            <?php the_excerpt(); ?>

                        </div>

                        <footer class="post-single__footer">

                            <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Read more', 'storefront'); ?> <span class="icon icon--small"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/arrow-right.svg') ?></span></a>

                        </footer>

                    </article>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

        <span id="posts-slider-prev" class="chevron chevron-prev"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-left.svg') ?></span>

        <span id="posts-slider-next" class="chevron chevron-next"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/chevron-right.svg') ?></span>

    </div>

</section>
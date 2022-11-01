<?php
$args = array(
    'post_type' => 'product',
    'posts_per_page' => 8
);

$query = new WP_Query($args);
?>

<section class="container home-products__container">

    <?php /* if (have_rows('sidebar_categories')) : ?>

        <aside class="home-products__sidebar">

            <?php while (have_rows('sidebar_categories')) : the_row(); ?>

                <?php $image = get_sub_field('image'); ?>

                <?php $category = get_sub_field('category'); ?>

                <?php $parent_id = $category->term_id; ?>

                <?php $subcategories_ids = get_term_children($parent_id, 'product_cat'); ?>

                <div class="home-products__sidebar-single">

                    <div class="overlay"></div>

                    <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo $category->name; ?>">

                    <div class="home-products__sidebar-single-content">

                        <h4><?php echo $category->name; ?> <span class="count"><span><?php echo $category->count; ?></span></span></h4>

                        <?php if (!empty($subcategories_ids)) : ?>

                            <ul class="home-products__sidebar-subcategories">

                                <?php foreach ($subcategories_ids as $subcategory_id) : ?>

                                    <li>

                                        <?php
                                        $term = get_term($subcategory_id, 'product_cat');
                                        $term_link = get_term_link($term, 'product_cat');
                                        ?>

                                        <a href="<?php echo esc_url($term_link) ?>">

                                            <?php echo $term->name; ?>

                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endwhile; ?>

        </aside>

    <?php endif; */ ?>

    <?php if (have_rows('content_products')) : ?>

        <?php while (have_rows('content_products')) : the_row(); ?>

            <div class="home-products__content">

                <div class="home-products__content-header">

                    <div class="home-products__content-title">

                        <h4 class="section-subtitle"><?php the_sub_field('subtitle'); ?></h4>

                        <h3 class="section-title"><?php the_sub_field('title'); ?></h3>

                    </div>

                    <?php /* 

                    <div class="home-products__content-tabs">

                        <ul>

                            <li>
                                <a class="tab-active" href="javascript:void(0);"><?php _e('New Arrivals', 'storefront'); ?></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><?php _e('Best Sellers', 'storefront'); ?></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><?php _e('Sales', 'storefront'); ?></a>
                            </li>

                        </ul>

                    </div>
                    
                    */ ?>

                </div>


                <?php if ($query->have_posts()) : ?>

                    <ul class="home-products">

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

                            <?php wc_get_template_part('content', 'product'); ?>

                        <?php endwhile; ?>

                    </ul>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</section>
<?php

$logo = get_field('logo', 'option');

$args = array(
    'taxonomy' => 'product_cat',
    'hide_empty' => false,
    'parent'   => 0
);

$product_cat = get_terms($args);
?>

<div class="categories-menu__container">

    <div class="categories-menu__header">

        <div class="site-header__logo">

            <a aria-label="Home link" href="<?php echo home_url(); ?>">

                <img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo bloginfo('name'); ?>">

            </a>

        </div>

        <a href="javascript:void(0);" id="products-burger-close">

            <span class="icon icon--small icon-close-menu">

                <?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/close.svg'); ?>

            </span>

            <?php _e('Προϊόντα', 'storefront'); ?>

        </a>

    </div>

    <div class="categories-menu__buttons">

        <div class="categories-menu__buttons-single">

            <a href="#!"><?php _e('Deals', 'storefront'); ?></a>

        </div>

        <div class="categories-menu__buttons-single">

            <a href="#!"><?php _e('Services', 'storefront'); ?></a>

        </div>

        <div class="categories-menu__buttons-single">

            <a href="#!"><?php _e('Clearence', 'storefront'); ?></a>

        </div>

    </div>

    <div class="categories-menu">

        <h4 class="categories-menu__title"><?php _e('Όλες οι κατηγορίες', 'storefront'); ?></h4>

        <nav>

            <ul class="categories-menu__ul">

                <?php foreach ($product_cat as $parent_product_cat) : ?>

                    <?php $children = get_term_children($parent_product_cat->term_id, 'product_cat'); ?>

                    <?php

                    if (!empty($children)) :

                        $href = get_term_link($parent_product_cat->term_id); // prev > javascript:void(0)

                        $sub_class = 'has-children';

                    else :

                        $href = get_term_link($parent_product_cat->term_id);

                        $sub_class = 'not-children';

                    endif;

                    ?>

                    <li class="categories-menu__list-item <?php echo $sub_class; ?>">

                        <a class="categories-menu__list-item-parent" href="<?php echo $href; ?>"><?php echo $parent_product_cat->name; ?></a>

                        <?php

                        $child_args = array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                            'parent' => $parent_product_cat->term_id
                        );

                        $child_product_cats = get_terms($child_args);

                        ?>

                        <?php if ($child_product_cats) : ?>

                            <ul class="categories-menu__sub-category">

                                <?php foreach ($child_product_cats as $child_product_cat) : ?>

                                    <?php
                                    $depth_children_args = array(
                                        'taxonomy' => 'product_cat',
                                        'hide_empty' => false,
                                        'parent' => $child_product_cat->term_id
                                    );
                                    ?>

                                    <?php $depth_children = get_terms($depth_children_args); ?>

                                    <?php if (!empty($depth_children)) : ?>

                                        <?php $children_class = 'has-children'; ?>

                                    <?php else :  ?>

                                        <?php $children_class = ''; ?>

                                    <?php endif; ?>

                                    <li class="categories-menu__sub-category-item depth-children <?php echo $children_class; ?>">

                                        <a href="<?php echo get_term_link($child_product_cat->term_id); ?>"> <?php echo $child_product_cat->name; ?></a>

                                        <?php if (!empty($depth_children)) : ?>

                                            <ul class="categories-menu__depth-2">

                                                <?php foreach ($depth_children as $depth_child) : ?>

                                                    <li><a href="<?php echo get_term_link($depth_child->term_id); ?>"><?php echo $depth_child->name; ?></a></li>

                                                <?php endforeach; ?>

                                            </ul>

                                        <?php endif; ?>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        <?php endif; ?>

                    </li>

                <?php endforeach; ?>

            </ul>

        </nav>

    </div>

</div>
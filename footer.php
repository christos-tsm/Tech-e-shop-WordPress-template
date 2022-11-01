<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

<footer class="site-footer">

    <div class="container footer-menus">

        <div class="footer-menu footer-col">

            <h5><?php _e('About', 'storefront'); ?></h5>

            <nav>

                <ul>

                    <li><a href="/privacy-policy"><?php _e('Privacy Policy', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Blog', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Carrers', 'storefront') ?></a></li>

                </ul>

            </nav>

        </div>

        <div class="footer-menu footer-col">

            <h5><?php _e('Shop', 'storefront'); ?></h5>

            <nav>

                <ul>

                    <li><a href="#!"><?php _e('Brands', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Deals', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Rebates', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Print ad', 'storefront') ?></a></li>

                </ul>

            </nav>

        </div>

        <div class="footer-menu footer-col">

            <h5><?php _e('Customer Service', 'storefront'); ?></h5>

            <nav>

                <ul>

                    <li><a href="#!"><?php _e('Contact us', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Order Tracking', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Satisfaction Guarantee', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Return Policy', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Privacy Policy', 'storefront') ?></a></li>

                </ul>

            </nav>

        </div>

        <div class="footer-menu footer-col">

            <h5><?php _e('Services', 'storefront'); ?></h5>

            <nav>

                <ul>

                    <li><a href="#!"><?php _e('Services', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Financing', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Delivery', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Shipping', 'storefront') ?></a></li>

                    <li><a href="#!"><?php _e('Sales', 'storefront') ?></a></li>

                </ul>

            </nav>

        </div>

        <div class="footer-menu footer-col">

            <h5><?php _e('Follow us', 'storefront'); ?></h5>

            <nav class="footer-social">

                <ul>

                    <li><a target="_blank" rel="noreferrer" aria-label="Social media link" href="#!" class="icon"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/facebook.svg'); ?></a></li>

                    <li><a target="_blank" rel="noreferrer" aria-label="Social media link" href="#!" class="icon"><?php echo file_get_contents(get_stylesheet_directory() . '/assets/images/twitter.svg'); ?></a></li>

                </ul>

            </nav>

        </div>

    </div>

    <div class="copyrights container">

        <p><span>&copy; <?php echo bloginfo('name'); ?> 2022</span> <a href="https://www.net22.gr" target="_blank" rel="noreferrer">Designed by <span>Net22</span></a></p>

    </div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
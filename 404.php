<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<div class="error-404 not-found">

			<h1><?php _e('Η σελίδα δεν βρέθηκε!', 'storefront'); ?></h1>

			<a class="cta cta--secondary" href="<?php echo home_url(); ?>"><?php _e('Επιστροφή στην αρχική', 'storefront'); ?></a>

		</div><!-- .error-404 -->

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

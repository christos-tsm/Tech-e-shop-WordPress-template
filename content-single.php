<?php

/**
 * Template used to display post content on single pages.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php if (has_post_thumbnail()) : ?>

			<div class="post-content__thumbnail">

				<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title() ?>">

			</div>

		<?php endif; ?>

		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header>

	<div class="post-content__container">

		<div class="post-content__text">

			<?php the_content(); ?>

		</div>

		<a class="cta cta--secondary" href="/blog"><?php _e('Όλα τα άρθρα', 'storefront'); ?></a>

	</div>

</article><!-- #post-## -->
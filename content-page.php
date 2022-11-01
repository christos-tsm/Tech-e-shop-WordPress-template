<?php

/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

if (!is_account_page() && !is_checkout() && !is_cart()) :

	$class = "page-content--simple";

endif;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header>

	<div class="page-content <?php if ($class) : echo $class; endif; ?>">

		<?php the_content(); ?>

	</div>

</article><!-- #post-## -->
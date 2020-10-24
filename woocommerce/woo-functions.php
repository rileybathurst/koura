<?php

if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ); ?>

		<a href="<?php echo esc_url( $link ); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link card shadow">
	<?php }
}

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() { ?>
		<div class="card-image category-thumbnails">
			<?php the_post_thumbnail('medium'); ?>
		</div>
	<?php }
}

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function woocommerce_template_loop_product_title() { ?>
		<div class="card-section text-center">
			<h2 class="woocommerce-loop-product__title text-center"><?php echo get_the_title(); ?></h2>
	<?php }
}

if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
	/**
	 * Insert the opening anchor tag for products in the loop.
	 */
	function woocommerce_template_loop_product_link_close() { ?>
			</div> <!-- .card-section -->
		</a>
	<?php }
}

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

	// nothing
}

// bring this inside the card
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 100 );

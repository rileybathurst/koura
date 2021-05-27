<?php
/*
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="grid-x grid-margin-x">
	<div class="cell">
		<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
			<?php do_action( 'woocommerce_before_single_product_summary' ); ?>
		</div>
	</div>

	<div class="cell small-12 medium-6 large-8">
		<div class="summary entry-summary">
			<?php do_action( 'woocommerce_single_product_summary' ); ?>
		</div>
	<?php do_action( 'woocommerce_after_single_product_summary' ); ?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>

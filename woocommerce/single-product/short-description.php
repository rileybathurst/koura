<?php
/**
 * Single product short description
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/short-description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  Automattic
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

// set global
global $product;

// $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

// if ( ! $short_description ) {
//	return;
// }

?>

	<!-- show brands name also used for schema of brand -->
	<div class="cell global-padding-vertical" >

		<!-- very hacky way of way of pulling full list then string replacing items with php -->
		<?php
			$cats = $product->get_categories();

			$remove = array("Uncategorised","Brands","Coats","Dresses","Jackets","Jewellery","Jumpsuits","Knitwear","Pants","Shoes","Shorts","Skirts","Tops",",");
			$brand = str_replace($remove, "", $cats);
	?>

		<span itemprop="brand"><?php echo $brand; ?></span>

	</div>

<!-- alwayas use the full description as it's been moved up -->
<div class="woocommerce-product-details__short-description">
	<p><?php the_content(); ?></p>
</div>

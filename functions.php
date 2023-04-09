<?php

if (!function_exists('koura_setup')) :
	/* Sets up theme defaults and registers support for various WordPress features. */
	function koura_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/* Let WordPress manage the document title. */
		add_theme_support('title-tag');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'text_domain'),
			'secondary' => __('Seconday Menu', 'text_domain'),
			'social'  => __('Social Links Menu', 'text_domain'),
		));

		/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
		add_theme_support('html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		));

		/* Enable support for Post Formats. */
		add_theme_support('post-formats', array(
			'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		));
	}

	function koura_styles() {
		wp_enqueue_style('koura_style', get_template_directory_uri() . '/css/app.css');
		}
		add_action('wp_enqueue_scripts', 'koura_styles');
	
	function koura_scripts()
		{
			wp_enqueue_script('koura_script', get_template_directory_uri() . '/js/app.js', array(), false, true);
		}
		add_action('wp_enqueue_scripts', 'koura_scripts');

		add_theme_support('woocommerce');

	endif; // koura_setup
add_action('after_setup_theme', 'koura_setup');

/* Enqueue scripts and styles. */

// remove p from posts - was making some wierd stuff with flagbanner and extremely custom styling
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

// Change the email that root level mail is sent from
add_filter('wp_mail_from', function ($email) {
	return 'info@katerina.co.nz';
});

add_filter('wp_mail_from_name', function ($name) {
	return 'Katerina';
});

// deals with variable set through form _POST
function prefix_admin_contact()
{
	// gitignore the key
	require get_parent_theme_file_path( '/etc/captchaKey.php' );

	// Check if captcha has been checked
	$captcha = $_POST['g-recaptcha-response'];

	// If no captcha
	if (!$captcha) {
		// Redirect
		wp_redirect(home_url() . '/sorry');
		exit;
	}

	// When the captcha is checked make sure its not spam

	$ip = $_SERVER['REMOTE_ADDR'];

	$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);
	$responseKeys = json_decode($response, true);
	if (intval($responseKeys["success"]) !== 1) {

		// Spam
		wp_redirect(home_url() . '/sorry');
	} else {

		// Not Spam and checked captcha
		// $todev = 'riley@rileybathurst.com';
		$tokaterina = 'info@katerina.co.nz';
		$to2 = $_POST['email'];

		$subject = 'Katerina enquiry: ' . $_POST['name'];

		$txt = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>Untitled Document</title>
					</head>

					<body bgcolor="#ebebeb">

						<table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ebebeb" align="center">
							<tbody>
								<tr>
									<table style="border-left: 2px solid #e6e6e6; border-right: 2px solid #e6e6e6;" cellspacing="0" cellpadding="25" width="605" align="center">

										<tr>
											<td width="596" align="center" style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left; height: 50px;">
												<p style="margin-bottom: 10px; font-size: 22px; font-weight: bold; color: #494a48; font-family: arial; line-height: 110%; text-align: center;">Katerina.co.nz</p>
											</td>
										</tr>

										<tr>
											<td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: left;" align="center">

												<hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

												<p>
													Thanks for your contact, ' .
			$_POST['name'] .
			' we will be in touch ASAP.
												</p>

												<hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

												<p>
													For your records the message was,
												</p>

												<p> ' .
			$_POST['add_notes'] .
			'</p>

												<hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

												<p>
													We will contact you back on, ' .
			$_POST['email'] .
			' or ' .
			$_POST['phone'] .
			'</p>

												<hr style="color:#d9d9d9;background-color:#d9d9d9;min-height:1px;border:none;"/>

											</td>
										</tr>

										<tr>
											<td style="background-color: #ffffff; border-top: 0px solid #000000; text-align: center;" align="center">
												<span style="font-size: 11px; color: #575757; line-height: 200%; font-family: arial; text-decoration: none;">
													Katerina. 3 Garlans Road. RD 1. Woolston, Chirstchurch<br />
													<a href="mailto:info@katerina.co.nz">info@katerina.co.nz</a><br />
													Phone (021) 1127 7683
												</span>
											</td>
										</tr>

									</table>
								</tr>
							</tbody>
						</table>
					</body>
				</html>
			';

		add_filter('wp_mail_from_name', function ($name) {
			return 'Katerina';
		});

		add_filter('wp_mail_content_type', 'set_content_type');
		function set_content_type($content_type)
		{
			return 'text/html';
		}

		wp_mail($todev, $subject, $txt);
		wp_mail($tokaterina, $subject, $txt);
		wp_mail($to2, $subject, $txt);

		wp_redirect(home_url() . '/thanks');
	}

	exit;
}

add_action('admin_post_contact', 'prefix_admin_contact');
add_action('admin_post_nopriv_contact', 'prefix_admin_contact');

// woo additions
require get_parent_theme_file_path( '/etc/woo.php' );
// require get_parent_theme_file_path('/woocommerce/woo-functions.php');

// open graph
function add_open_graph_meta()
{

	global
		$fb_title,
		$fb_description,
		$fb_url,
		$fb_brand,
		$fb_availability,
		$fb_product_condition,
		$fb_product_price_amount,
		$fb_product_price_currency,
		$fb_retailer_item_id;

	if (is_product()) {
		$product = new WC_Product(get_the_ID());
		$fb_title = $product->get_name();
		$fb_description =  $product->get_description();
		$fb_url = $product->get_permalink();
		//There's a featured/thumbnail image for this listing
				// echo '<meta property="og:image" content="'.the_post_thumbnail_url().'">'; // nope as in it breaks the site
		$fb_brand = get_post_meta($product->get_ID(), 'brand', true); // need to get rid of link // currently array
		// Get in stock & out of stock
		if ($product->is_in_stock()) {
			$fb_availability = "in stock";
		};
		$fb_product_condition = "new"; // hardcoded - needs a default dropdown as an extra thing to do
		$fb_product_price_amount = $product->get_price();
		$fb_product_price_currency = get_woocommerce_currency();
		$fb_retailer_item_id = $product->get_ID();
	}
}

add_action('wp_head', 'add_open_graph_meta');

/********* DO NOT COPY THE PARTS ABOVE THIS LINE *********/
/* Change Yoast SEO OpenGraph type
 * Credit: Yoast Team
 * Last Tested: Jul 11 2017 using Yoast SEO 5.0.1 on WordPress 4.8
 */
add_filter('wpseo_opengraph_type', 'yoast_change_opengraph_type', 10, 1);
function yoast_change_opengraph_type($type)
{
	/* Make magic happen here
   * Example below changes the homepage to a book type
   */

	if (is_single()) {
		return 'product';
	} else {
		return $type;
	}
}

/**
	* WOOCOMMERCE
*/

/**
 * https://docs.woocommerce.com/document/change-number-of-products-per-row/
 * I dont think I need this anymore
 */
/* add_filter('loop_shop_columns', 'loop_columns', 999); */
if (!function_exists('loop_columns')) {
	function loop_columns()
	{
		return 4; // 3 products per row
	}
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_full', 15 );

if ( ! function_exists( 'woocommerce_full' ) ) {

	/**
	 * Output the product price.
	 */
	function woocommerce_full() {
		the_content();
	}
}


// ! check how useful all this stuff actually is


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
			</div>
		</a>
	<?php }
}

if ( ! function_exists( 'woocommerce_template_loop_add_to_cart' ) ) {

	// nothing
}

// bring this inside the card
// add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 100 );

/**
 * Add a new dashboard widget.
 * // TODO: this doesnt have stats its just very simple
 */
function wpdocs_add_dashboard_widgets() {
	wp_add_dashboard_widget( 'dashboard_widget', 'Page Stats', 'dashboard_widget_function' );
}
add_action( 'wp_dashboard_setup', 'wpdocs_add_dashboard_widgets' );

/**
 * Output the contents of the dashboard widget
 */
function dashboard_widget_function( $post, $callback_args ) {
	// esc_html_e( "Hello World, this is my first <a href='#'>Dashboard</a> Widget!", "textdomain" );
	echo "<a href='https://katerina.co.nz/wp-admin/admin.php?page=stats#!/stats/day/posts/katerina.co.nz?startDate=2023-04-09&summarize=1&num=7'>Product Stats Page</a>";
}

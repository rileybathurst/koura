<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- google font link -->
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">

	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-12917302-14"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-12917302-14');
	</script>

	<!-- recaptcha -->
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- removed this from header when local dev it breaks -->
<?php
	// Open Graph Metadata
	// currently just hacked together to see if this fixes the instagram shopping not as a long term code
		if( is_product() ){
			global $fb_title, $fb_description, $fb_url, $fb_brand, $fb_availability, $fb_product_condition, $fb_product_price_amount, $fb_product_price_currency, $fb_retailer_item_id;

			$fb_categories = get_the_category();
			if ( ! empty( $fb_categories ) ) {
				echo esc_html( $fb_categories[0]->name );
			} else {
				$fb_categories = "katerina";
			} ?>

			<meta property="og:title" content="<?php echo $fb_title; ?>">
			<!-- <meta property="og:description" content="< php echo $fb_description; ?>"> test remove this for single product -->
			<meta property="og:url" content="<?php echo $fb_url; ?>">
			<meta property="og:image" content="<?php the_post_thumbnail_url(); ?>"><!-- not working in the plug in so doing a hack here -->
			<!-- functional but I would love to pull it from the category -->
			<meta property="product:brand" content="<?php echo $fb_categories; ?>"> <!-- hacked on -->
			<meta property="product:availability" content="<?php echo $fb_availability; ?>"> <!-- sort of the same thing as brand needs global post product $product->stock -->
			<meta property="product:condition" content="new"> <!-- needs a default meta -->
			<meta property="product:price:amount" content="<?php echo $fb_product_price_amount; ?>">
			<meta property="product:price:currency" content="<?php echo $fb_product_price_currency; ?>">
			<meta property="product:retailer_item_id" content="<?php echo $fb_retailer_item_id; ?>">
			<!-- End Open Graph Metadata -->

		<!-- end of if( is_product()) -->
	<?php } ?>

	<meta property="test" content="dev">

</head>

<body <?php body_class(); ?>>

	<!-- facebook app code to be used for instagram shopping -->
	<!-- breaks while local dev -->
	<script>
	window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1741893722579772',
		  cookie     : true,
		  xfbml      : true,
		  version    : '{api-version}'
		});

		FB.AppEvents.logPageView();

	};

	(function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "https://connect.facebook.net/en_US/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>

	<!-- this is the off canvas aka small menu -->
	<!-- <div class="off-canvas position-right" id="offCanvas" data-off-canvas data-position="right"> -->
	<div id="offCanvas" class="off-canvas">
		<button id="close-top" class="close-menu">Close Menu</button>
		<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo bloginfo( 'name' ); ?></a></h2>
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>about">About</a></p>
		<hr />
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
			<nav>
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'items_wrap' => '<ul>%3$s</ul>', // more complex because it needs the outside of the class
					) );
				?>
			</nav>
		<?php } ?>
		<button id="close-bottom" class="close-menu">Close Menu</button>
	</div><!-- off canvas -->

	<div class="backed">
		<div class="top-bar">
				<!-- option for empty cart -->
				<?php if( WC()->cart->get_cart_contents_count() == 0 ) { ?>
					<h4 class="global-padding-top">All prices are in New Zealand dollars.</h4>

				<!-- cart displayed once products added -->
				<?php } else { ?>
					<h4 class="global-padding-top"><a href="<?php echo esc_url( home_url( '/' ) ); ?>cart" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a></h4>
				<?php }; ?>

				<h4 class="text-right global-padding-top show-for-medium">Call us on <a href="tel:021 112 7683">021 112 7683</a></h4>
		</div><!-- top-bar -->
	</div><!-- .backed -->

	<header class="header">
		<!-- this should be the if has been customized -->
		<?php $logo = get_template_directory() . '/img/' . get_bloginfo( 'name' ) . '.png';

		if ( file_exists ($logo) ) { ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri() . '/img/' . get_bloginfo( 'name' ) . '.png'; ?>" alt="<?php bloginfo ('name') ?>"></a>
		<?php } else { if ( is_front_page() && is_home() ) : ?>
			<h1><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class=""><?php echo bloginfo( 'name' ); ?></a></strong></h1>
		<?php else : ?>
			<h3 class="h1"><strong><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class=""><?php echo bloginfo( 'name' ); ?></strong></a></h3>
		<?php endif; } ?>

			<div>
				<span class="show-for-medium"><?php get_search_form(); ?></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>sale" class="button button-zero-margin show-for-medium">Sale</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>cart" class="button button-zero-margin">Cart</a>
				
				<button id="offCanvasToggle" class="button button-zero-margin hide-for-large">Menu</button>
			</div><!--  -->
	</header><!-- grid-container -->

	<div class="backed show-for-large">
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
			<nav>
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'theme_location'	=> 'primary',
						'items_wrap'		=> '<ul id="header_nav" class="dropdown menu">%3$s</ul>', // more complex because it needs the outside of the class
					) );
				?>
			</nav>
		<?php } ?>
	</div><!-- grid-container backed -->

	<hr class="no-margin-vertical max-width-100">

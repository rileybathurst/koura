<footer><!-- start footer -->

	<div class="bottom-bar">
		<div class="grid-container ">
			<div class="grid-x grid-padding-x global-padding-vertical">
					<?php if ( has_nav_menu( 'secondary' ) ) { ?>
						<nav class="cell">
							<?php
								// Primary navigation menu.
								wp_nav_menu( array(
									'theme_location'	=> 'secondary',
									'items_wrap'		=> '<ul id="footer_nav" class="dropdown menu" data-dropdown-menu>%3$s</ul>', // more complex because it needs the outside of the class
								) );
							?>
						</nav>
				<?php } ?>
			</div>
		</div>
	</div>

	<nav class="grid-container full footer">
		<div class="grid-x grid-padding-x global-padding-vertical">
			<div class="cell">
				<p class="text-center">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="body-color-link"><?php echo bloginfo( 'name' ); ?></a> &copy; <?php echo date( 'Y' ); ?>.&nbsp;
					All Rights Reserved.
					&nbsp;|&nbsp;
					<a href="<?php echo esc_url( home_url( '/?page_id=28' ) ); ?>" class="body-color-link">Terms</a>
					&nbsp;|&nbsp;
					<a href="<?php echo esc_url( home_url( '/?page_id=24' ) ); ?>" class="body-color-link">Returns &amp; Shipping</a>
				</p>
			</div>
		</div>
	</nav>

</footer><!-- end footer -->

<!-- close from header -->
					</div><!-- inner wrap -->
				</div><!-- off canvas wrap -->
			</div><!-- background image header -->

<!-- basic foundation scripts always needed -->
			<script src="<?php echo get_template_directory_uri(); ?>/node_modules/jquery/dist/jquery.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/node_modules/what-input/dist/what-input.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/node_modules/foundation-sites/dist/js/foundation.min.js"></script>
			<script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

<!-- basic close wordpress always needed -->
		<?php wp_footer(); ?>

<!-- close from header -->
	</body>
</html>

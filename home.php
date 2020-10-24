<?php
/*
 *  Template Name: Home
 */
?>

<?php get_header(); ?>

<!-- Start the main container -->
<div class="container" role="document">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post();

			/*
			 * Pull in a different sub-template, depending on the Post Format.
			 *
			 * Make sure that there is a default '<tt>format.php</tt>' file to fall back to
			 * as a default. Name templates '<tt>format-link.php</tt>', '<tt>format-aside.php</tt>', etc.
			 *
			 * You should use this in the loop.
			 */

			$format = get_post_format();
			get_template_part( 'format', $format );
			?>

			<div >

				<div class="grid-container grid-padding-collapse">
					<div class="grid-x small-margin-collapse medium-margin">

						<!-- post -->
						<div class="cell flex img-100">
							<?php the_post_thumbnail( 'full' ); ?>
							<h2 class="over-flex text-center"><?php the_content(); ?></h2>
						</div>
					</div>

				</div><!-- grid-container -->
			</div><!-- post -->

		<?php endwhile; ?><!-- while have posts -->

		<?php else : ?>
			<div class="grid-container">
				<div class="grid-x grid-padding-x">
					<div class="cell">

						<p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
						<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
					 </div><!--.entry-->
				</div><!-- grid-x -->
			</div><!-- grid-container -->

	<?php endif; ?><!-- if have posts -->

</div><!-- container -->

<?php get_footer(); ?>

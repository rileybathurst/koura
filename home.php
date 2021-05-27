<?php
/*
 *  Template Name: Home
 */
?>

<?php get_header(); ?>

<!-- Start the main container -->
<div class="container" role="document">
	<main>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post();

			$format = get_post_format();
			get_template_part( 'format', $format );
			?>

			<div class="featured">
				<?php the_post_thumbnail( 'full' ); ?>
				<a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
			</div>

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
</main>
</div><!-- container -->

<?php get_footer(); ?>

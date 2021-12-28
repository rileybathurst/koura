<?php
/*  
 *  Template Name: Full
 */ 
?>

<?php get_header(); ?>

<!-- Start the main container -->
<div class="container" role="document">

	<?php if (have_posts()) {
		while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="grid-container">
					<div class="grid-x grid-padding-x">
						<div class="cell">
							<h2 class="category-title"><?php the_title(); ?></h2>
							<?php the_post_thumbnail();
							the_content(); ?>
						</div>
					</div>
				</div>
			</div>

		<?php endwhile; // while have posts

	} else { ?>
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell">

					<p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
					<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>

				</div>
			</div>
		</div>

	<?php } ?><!-- if have posts -->

</div><!-- container -->

<?php get_footer(); ?>

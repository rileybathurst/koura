<?php
/*  
 *  Template Name: Full
 */
?>

<?php get_header(); ?>

	<?php if (have_posts()) {
		while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="page-title"><?php the_title(); ?></h2>
					<?php
						the_post_thumbnail();
						the_content();
					?>
			</div>

		<?php endwhile; // while have posts

	} else { ?>
		<div class="two-fold">
			<section>
				<p>This page is out of fashion.</p>
				<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
			</section>
		</div>

	<?php } ?><!-- if have posts -->

</div>

<?php get_footer(); ?>

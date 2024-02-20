<?php get_header(); ?>

	<?php if (have_posts()) {
		while (have_posts()) : the_post(); ?>

			<main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h2 class="category-title">
					<?php the_title(); ?>
				</h2>

				<?php
					the_post_thumbnail();
					the_content();
				?>
			</main>

		<?php endwhile; // while have posts

	} else { ?>
		<section>
				<div>
					<p>This page is out of fashion.</p>
					<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
			</div>
		</section>

	<?php } ?><!-- if have posts -->

<?php get_footer(); ?>

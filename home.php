<?php
/*
 *  Template Name: Home
 */
?>

<?php get_header(); ?>

<main>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post();

			$format = get_post_format();
			get_template_part( 'format', $format );
			?>

			<div class="cover">
				<?php the_post_thumbnail( 'full' ); ?>
				<a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
			</div>

		<?php endwhile; ?><!-- while have posts -->

		<?php else : ?>
			<div class="two-fold">
				<section>
						<p>This page is out of fashion.</p>
						<p>Please go back to the <a href="/" title="home">homepage</a> and try again.</p>
			</section>
		</div>

	<?php endif; ?>
</main>

<?php get_footer(); ?>

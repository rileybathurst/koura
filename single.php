<?php get_header();

if (have_posts()) {
	while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>

	<?php endwhile;
} else { ?>
	<section>
			<div>
				<p>This page is out of fashion.</p>
				<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
		</div>
	</section>
<?php };

get_footer(); ?>
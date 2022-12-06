<?php get_header();

if (have_posts()) {
	while (have_posts()) : the_post(); ?>
		<?php the_content(); ?>

	<?php endwhile;
} else { ?>
	<div class="grid-container" role="document">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
				<p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
			</div><!--.entry-->
		</div><!-- grid-x -->
	</div><!-- container -->
<?php };

get_footer(); ?>
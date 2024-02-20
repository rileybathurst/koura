<?php get_header(); ?>


<section>
    <!-- // TODO: run this the same as the home page -->
    <div class="cover">
        <!-- // TODO: check the sizes on these -->
        <picture>
            <source srcset="<?php echo content_url(); ?>/uploads/2018/02/missing-large.jpg" media="(min-width: 1200px)" />
            <source srcset="<?php echo content_url(); ?>/uploads/2018/02/missing-medium.jpg" media="(min-width: 600px)" />
            <img src="<?php echo content_url(); ?>/uploads/2018/02/missing-small.jpg " alt="missing" />
        </picture>

        <h2>
            <a href="<?php echo home_url(); ?>/" title="home" class="over-flex">
                This page is out of fashion.
            </a>
        </h2>
    </div>
</section>

<section>
    <p class="text-center">Please go back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a> and try again.</p>
</section>

<?php get_footer(); ?>

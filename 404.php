<?php get_header(); ?>

<div class="grid-container">     
    <div class="grid-x grid-padding-x">
	   <div class="cell">

            <div class="flex">
                <img data-interchange="[<?php echo content_url(); ?>/uploads/2018/02/missing-small.jpg, small], [<?php echo content_url(); ?>/uploads/2018/02/missing-medium.jpg, medium], [<?php echo content_url(); ?>/uploads/2018/02/missing-large.jpg, large]">
                <h2><a href="<?php echo home_url(); ?>/" title="home" class="over-flex">Oh no! we're lost.</a></h2>
            </div>
        
        </div>
	</div>
</div>

<div class="grid-container">     
    <div class="grid-x grid-padding-x global-padding-vertical">
	   <div class="cell">
           <p class="text-center">Lets try and start from <a href="<?php echo esc_url( home_url( '/' ) ); ?>">home</a>.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
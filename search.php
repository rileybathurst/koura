<?php get_header(); ?>

<!-- Start the main container -->
<div class="container" role="document">
    <div class=""><!-- post  -->
        <div class="grid-x grid-padding-x drop">
            
            <div class="cell">
                <header class="page-header">
                    <?php if ( have_posts() ) : ?>
                        <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                    <?php else : ?>
                        <h2 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h2>
                    <?php endif; ?>
                </header><!-- .page-header -->
            </div>

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

                    <!-- <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

                        <div class="small-6 medium-4 cell">
                            <div class="card">
                                <div class="card-section woo-image-center">
                                    <a href="<?php the_permalink(); ?>">
                                        <!-- thumbnail -->
                                        <?php the_post_thumbnail( 'small' ); ?>
                                    </a>
                                </div> <!-- .card-section -->

                                <div class="card-section">
                                    <!-- title -->
                                    <h6 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

                                    <!-- price -->
                                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                                        <p class="text-center"><?php echo $price_html; ?></p>
                                    <?php endif; ?>
                                </div> <!-- .card-section -->

                            </div> <!-- .card -->
                        </div> <!-- .cell -->    
                   <!--  </div> post -->

                <?php endwhile; ?><!-- while have posts -->

                <?php else : ?>

                    <div class="cell">
                        <p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
                        <p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
                    </div><

            <?php endif; ?>
	
        </div>
    </div>
</div>

<?php get_footer(); ?>
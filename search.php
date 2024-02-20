// TODO: this is pretty broken

<?php get_header(); ?>

<section>
    <?php if ( have_posts() ) : ?>
        <h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
    <?php else : ?>
        <h2 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h2>
    <?php endif; ?>
</section>

<section class="products">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); 

            $format = get_post_format();
            get_template_part( 'format', $format );
            ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="product">
                    <div class="card">
                        <div class="card-section woo-image-center">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'small' ); ?>
                            </a>
                        </div>

                        <div class="card-section">
                            <h6 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

                            <?php if ( $price_html = $product->get_price_html() ) : ?>
                                <p class="text-center"><?php echo $price_html; ?></p>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    <?php else : ?>

        <div>
            <p>This page is out of fashion.</p>
            <p>How about head back to the <a href="/" title="home">home page</a> and start again</p>
        </div>

    <?php endif; ?>

</section>


<?php get_footer(); ?>
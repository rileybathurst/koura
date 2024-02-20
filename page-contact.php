<?php
/*  
 *  Template Name: Contact
 */ 
?>

<?php get_header(); ?>

<!-- Start the main container -->
<!-- <div role="document"> -->
<div class="two-fold">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div>
                <?php the_content(); ?>
            </div>
            
            <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype='multipart/form-data' method="post" data-abide novalidate>
                <!-- enctype='multipart/form-data' is key to submitting documents -->

                <input type="hidden" name="action" value="contact">
                <input type="hidden" name="data" value="contactid"><!-- slightly different value to differentiate, not used -->

                
                <label for="name">Full Name:*</label>
                <input name="name" type="text" required id="name"
                <?php if ( is_user_logged_in() ) { ?>
                        value="<?php echo $current_user->display_name; ?>"
                    <?php } else { ?>
                        placeholder="Jane Smith"
                    <?php } ?>
                />
                <small class="form-error">A full name is required.</small>

                <label for="email">email:*</label>
                <input name="email" type="text" required pattern="email" id="email"  
                <?php if ( is_user_logged_in() ) { ?>
                    value="<?php echo $current_user->user_email; ?>"
                    <?php } else { ?>
                        placeholder="info@katerina.co.nz"
                    <?php } ?>
                />
                <small class="form-error">An email address is required.</small>


                <label for="phone">Phone:*</label>
                <input name="phone" type="text" required id="phone" placeholder="&#40;021&#41;">
                <small class="form-error">A phone number is required.</small>

                <label for="add_notes">Notes</label>
                <input type="text" name="add_notes">

                <div class="g-recaptcha" data-sitekey="6Ldqx0cUAAAAAOibo4zRzPeyppkjhS1oho2HZD2L"></div>

                <button type="submit">Submit</button>
            </form>
        <?php endwhile; ?>

    <?php else : ?>
            <div>
                <p>This page is out of fashion.</p>
                <p>How about head back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="home">home page</a> and start again</p>
            </div>

    <?php endif; ?><!-- if have posts -->

</div>

<?php get_footer(); ?>
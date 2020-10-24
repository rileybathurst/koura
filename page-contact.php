<?php
/*  
 *  Template Name: Contact
 */ 
?>

<?php get_header(); ?>

<!-- Start the main container -->
<div class="grid-container" role="document">
    <div class="grid-x grid-padding-x global-padding-vertical">

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

            
                <div class="small-12 medium-6 cell">
                        <?php the_content(); ?>
                </div>
                
        
                <div class="small-12 medium-6 cell">
                    <!-- enctype='multipart/form-data' is key to submitting documents -->
                    <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" enctype='multipart/form-data' method="post" data-abide novalidate>

                        <input type="hidden" name="action" value="contact">
                        <input type="hidden" name="data" value="contactid"><!-- slightly different value to differentiate, not used -->

                        <div class="grid-container">     
                            <div class="grid-x grid-padding-x">
                                <div class="small-12 medium-3 columns">
                                    <label for="name" class="right-medium-up">Full Name:*</label>
                                </div>

                                <div class="small-12 medium-9 columns">
                                    <input name="name" type="text" required id="name"
                                       <?php if ( is_user_logged_in() ) { ?>
                                            value="<?php echo $current_user->display_name; ?>"
                                        <?php } else { ?>
                                            placeholder="J Smith"
                                        <?php } ?>
                                    />

                                    <!-- error -->
                                    <small class="form-error">A full name is required.</small>
                                </div>
                            </div>
                        </div>

                        <div class="grid-container">     
                            <div class="grid-x grid-padding-x">
                                <div class="small-12 medium-3 columns">
                                    <label for="email" class="right-medium-up">email:*</label>
                                </div>

                                <div class="small-12 medium-9 columns">
                                    <input name="email" type="text" required pattern="email" id="email"  
                                        <?php if ( is_user_logged_in() ) { ?>
                                            value="<?php echo $current_user->user_email; ?>"
                                        <?php } else { ?>
                                            placeholder="info at katerina.co.nz"
                                        <?php } ?>       
                                    /><small class="form-error">An email address is required.</small>
                                </div>
                            </div>
                        </div>

                        <div class="grid-container">     
                            <div class="grid-x grid-padding-x">
                                <div class="small-12 medium-3 columns">
                                    <label for="phone" class="right-medium-up">Phone:*</label>
                                </div>

                                <div class="small-12 medium-9 columns">
                                    <input name="phone" type="text" required id="phone" placeholder="&#40;021&#41;">
                                    <small class="form-error">A phone number is required.</small>
                                </div>
                            </div>
                        </div>

                        <div class="grid-container">     
                            <div class="grid-x grid-padding-x">
                                <div class="small-12 medium-3 columns">
                                    <label for="add_notes" class="right-medium-up">Notes</label>
                                </div>
                                <div class="small-12 medium-9 columns">
                                    <input type="text" name="add_notes">
                                </div>
                            </div>
                        </div>
                        
                        <!-- recaptcha -->                                
                         <div class="grid-container">     
                            <div class="grid-x grid-padding-x">
                                <div class="small-12 medium-3 columns">
                                    <label for="add_notes" class="right-medium-up">&nbsp;</label>
                                </div>
                                <div class="small-12 medium-9 columns">
                                    <div class="g-recaptcha" data-sitekey="6Ldqx0cUAAAAAOibo4zRzPeyppkjhS1oho2HZD2L"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid-container">     
                            <div class="grid-x grid-padding-x global-padding-top">
                                <div class="show-for-medium medium-3 columns">&nbsp;</div>
                                <div class="small-12 medium-9 columns">
                                    <button type="submit" class="button">Submit</button>
                                </div>
                            </div>
                        </div>  
                        
                    </form>
                 
                </div>    
    
            <?php endwhile; ?><!-- while have posts -->
    	
        <?php else : ?>
			
            <div class="cell">
                <p>Hmmm, seems like what you were looking for isn't here.  You might want to give it another try - the server might have hiccuped - or maybe you even spelled something wrong (though it's more likely <strong>I</strong> did).</p>
                <p>How about head back to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="home">home page</a> and start again</p>
                
            </div>
	
        <?php endif; ?><!-- if have posts -->

    </div>                    
</div>

<?php get_footer(); ?>
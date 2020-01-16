<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package newsite
 */

get_header();?>
    
    <div class="uk-width-expand@m uk-align-center uk-margin-remove-bottom uk-flex-last@m">
        
        
            <?php
    		while ( have_posts() ) :
    			the_post();
    
    			get_template_part( 'template-parts/content', get_post_type() );
    
    			the_post_navigation();
    
    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;
    
    		endwhile; // End of the loop. ?>
    		
		
    </div>

    <?php get_sidebar();?>
        
<?php get_footer();?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * Template Name: Blocks
 * @package maharishi
 */

get_header();?>



    <?php if( '' !== get_post()->post_content ):;?>
        
        <section class="uk-section">
            <div class="uk-container">
                <div class="uk-grid" uk-grid>
                    <div class="uk-width-col">
                        <?php 
                            if(have_posts()) : 
                                while(have_posts()) : the_post();
                                    the_content();
                                
                                endwhile;
                            endif ;?>
                    </div>
                </div>
            </div>
        </section>
    
    
    
    <?php endif ;?>

    
    <?php get_template_part('template-parts/content-blocks') ;?>




<?php get_footer();?>

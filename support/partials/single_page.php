<?php
/**
 * The template for displaying all pages in a single page format, taken from the menu in admin
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 *
 * @package site
 */

get_header(); ?>

	<main id="main" class="site-main">
    	
        	<div class="uk-grid" data-uk-grid-margin>

        		<?php
        		    $locations = get_nav_menu_locations();
                    $menu_id = $locations['menu-1'];
                    $sections = wp_get_nav_menu_items( $menu_id );
                                        
                    foreach( $sections as $section):
                        
                        $postid = $section->object_id;
                        $post  = get_post($postid);?>
                    
                        <section class="uk-width-medium-8-10 uk-container-center" id="<?php echo $post->post_name ;?>">
                            <?php echo '<h2>'.esc_html(get_the_title($postid) ).'</h2>';?>                        
                            <?php echo apply_filters('the_content', $post->post_content);?>
                        </section>
                        
                        
                    <?php endforeach ;?>
                    
        	</div>
                    
    </main><!-- #main -->
		

<?php get_footer();?>

<?php
/**
 * Template part for displaying pages in a single page site.
 * Uses the main navigation for page id's, so follows the order of the menu
 */

?>

<?php 
    
    $locations = get_nav_menu_locations();
    $menu_id = $locations['menu-1'];
    $menus = wp_get_nav_menu_items( $menu_id );
                        
    
    
    
    foreach( $menus as $menu )
    {
        $pageid = $menu->object_id;
        
        if( $pageid == 4 ): //homepage
        
            continue;
        
        elseif( $pageid == {page to exclude} ): //exceptions, remove if not needed
            
            get_template_part('{page partials}');
        
        else:
        
            $page = get_post($pageid);?>
            
            
            <section id="<?php echo $page->post_name ?>">
                
                <div class="uk-container uk-container-center">
					<div class="uk-grid" data-uk-grid-margin>
						<div class="uk-width-medium-6-10 uk-push-2-10">

                    		<?php echo apply_filters( 'the_content', $page->post_content );
                    
                    			wp_link_pages( array(
                    				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'unltd' ),
                    				'after'  => '</div>',
                    			) );?>
                    
                        	<?php if ( get_edit_post_link() ) : ?>
                        		<footer class="entry-footer">
                        			<?php
                        				edit_post_link(
                        					sprintf(
                        						/* translators: %s: Name of current post */
                        						esc_html__( 'Edit %s', 'unltd' ),
                        						the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        					),
                        					'<span class="edit-link">',
                        					'</span>',
                        					$pageid
                        				);
                        			?>
                        		</footer><!-- .entry-footer -->
                        	<?php endif; ?>
						</div>
					</div>
                </div>
        </section><!-- #post-## -->
            
            
            
        <?php endif;
    }
                        
    ;?>
    
    
    
    
                        
                           




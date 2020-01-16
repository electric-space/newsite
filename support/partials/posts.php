<section id="news">
    <div class="uk-container uk-container-center">
    	<div class="uk-grid" data-uk-grid-margin>
    		<div class="uk-width-medium-2-3">
        		<h2><?php echo get_the_title(12) ;?></h2>
        		<?php
        		    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        		    $args = array( 
        		        'post_type' => 'post', 
        		        'posts_per_page' => 4,
        		        'paged' => $paged );
        		        
        		    $wp_query = new WP_Query( $args );
        		    
        		    if($wp_query->have_posts()) : while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
        		
        		        <article <?php post_class() ;?>>
        		            <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'article_thumb', array('class'=>'article-thumb') );?>
        		            <h2><a href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h2>
        		            <?php the_excerpt() ;?>
        		        </article>
        		    
        		<?php endwhile; ?>
        		
        		<?php else: ?>
        		
        		    <article>
        		        <h1>Sorry</h1>
        		        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        		    </article>
        		    
        		<?php endif; ?>
    		</div>
    		<div class="uk-width-medium-1-3">
        		<h2>Twitter</h2>
        		<ul>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        		</ul>
    		</div>
    	</div>
    </div>
</section><!-- #post-## -->


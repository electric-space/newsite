<?php 
/**
 *  Infinite next and previous post looping in WordPress
 */
 
 $post_type = 'projects';
 
 ;?>



<nav class="navigation post-navigation">

    <div class="nav-previous">
        <?php 
    
            if( get_adjacent_post(false, '', true) ) { 
            	previous_post_link('%link', 'Previous Project');
            } else { 
                $first = new WP_Query('posts_per_page=1&order=DESC&post_type="$post_type"'); $first->the_post();
                echo '<a href="' . get_permalink() . '">Previous Project</a>';
              	wp_reset_query();
            }; 
        ;?>
    </div>
    
    <div class="nav-next">
        <?php 
            
            if( get_adjacent_post(false, '', false) ) { 
            	next_post_link('%link', 'Next Project');
            } else {
            	$last = new WP_Query('posts_per_page=1&order=ASC&post_type="$post_type"'); $last->the_post();
                echo '<a href="' . get_permalink() . '">Next Project</a>';
                wp_reset_query();
            }; 
        ;?>
    </div>

</nav>



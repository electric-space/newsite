<div class="navigation post-navigation">
    
    <h2 class="screen-reader-text">Post Navigation</h2>
    
    <div class="nav-links custom">
        
        <?php 
            
            $posttype = get_post_type();
            
            // date based posts
            if( $posttype == 'post' ):;?>
                
                <div class="nav-next"><?php previous_post_link('%link') ;?></div>
                <div class="nav-prev"><?php next_post_link('%link') ;?></div>
                
        <?php
                
            else:
                
                // custom post order
                $postlist_args = array(
                   'posts_per_page'  => -1,
                   'orderby'         => 'title',
                   'order'           => 'ASC',
                   'post_type'       => $posttype,
                ); 
                
                $postlist = get_posts( $postlist_args );
                
                // get ids of posts retrieved from get_posts
                $ids = array();
                foreach ($postlist as $thepost) {
                   $ids[] = $thepost->ID;
                }
                
                
                // get and echo previous and next post in the same taxonomy
                $thisindex = array_search($post->ID, $ids);?>
                
                <div class="nav-next">
                <?php
                    // uncomment for wraparound 
                    /*
                    if( $thisindex+1 == count($ids) ){
                        echo '<a rel="prev" href="'.get_permalink($ids[0]).'" rel="nofollow">'.get_the_title($ids[0]).'</a>';    
                    }
                    */
                    
                    if ( $thisindex != count($ids)-1 ) {
                       $previd = $ids[$thisindex+1];
                       echo '<a rel="prev" href="' . get_permalink($previd). '" rel="nofollow">'.get_the_title($previd).'</a>';
                    }
                    
                ;?>
                
                </div>
                
                <div  class="nav-prev">
                <?php 
                    // uncomment for wraparound 
                    /*
                    if( $thisindex == 0){
                        echo '<a rel="prev" href="'.get_permalink( end($ids) ).'" rel="nofollow">'.get_the_title(end($ids)).'</a>';    
                    }
                    */
                    
                    if ( $thisindex != 0 ) {
                       $nextid = $ids[$thisindex-1];
                       echo '<a rel="next" href="' . get_permalink($nextid). '" rel="nofollow">'.get_the_title($nextid).'</a>';
                    }
                    
                ;?>
                    
                    
                </div>
                
        <?php endif ;?>
        
    </div>
    
    
</div>

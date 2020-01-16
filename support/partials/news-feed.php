 <?php 
     
    // Retrieves posts via RSS
    // manually adds pagination
    

    if( $feed = "https://filmfixer.co.uk/category/southwark/feed/"){
            
            if( isset($_GET['pg']) ){
                $curpage = $_GET['pg'];
            }else{
                $curpage = 1;
            }
            
            $args = array('feed'=> $feed, 'postsperpage'=> 9, 'curpage'=>$curpage);
            
            get_feed($args);
        }
            
            
            
        function get_feed($args){
                
                // Use cURL to fetch text
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $args['feed']);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt ($ch, CURLOPT_USERAGENT, $useragent);
                $rss = curl_exec($ch);
                curl_close($ch);
                
                // Manipulate string into object
                $rss = simplexml_load_string($rss);
                
                
                
                
                // set up some vars
                $postsperpage = $args['postsperpage'];
                $curpage = $args['curpage'];
                $postcount = count($rss->channel->item);
                $numpages = ceil($postcount/$postsperpage);
                $startposts = 0;
                $postid = 1;
                
                // set post count to 3 if on homepage
                if( is_front_page() )
                    $postsperpage = 3;
                
                
                for($i=0; $i<$postsperpage; $i++) {
                    
                    // generate post ids
                    $postid =   ( ($curpage * $postsperpage) + $i ) - $postsperpage;
                    
                    // change start position of posts
                    $startposts = $postid ;
                    
                    
                    $url   = $rss->channel->item[$startposts]->link;
                    $title = $rss->channel->item[$startposts]->title;
                    $desc  = $rss->channel->item[$startposts]->description;
                    $img   = $rss->channel->item[$startposts]->image;
                    $date  = $rss->channel->item[$startposts]->pubDate;
                    $new_date = date("jS F Y", strtotime('-4 hours', strtotime($date)));
                    
                    
                    // reached the end
                    if( $postid > $postcount-1 ){
                        continue;
                    }
                    
                    echo '
                        <div class="postid-'.$postid.'">
                            <a href="'.$url.'"><img src="'.$img.'" alt="" /></a>
                            <h3>'.$title.'</h3>';
                    echo $desc;
                    echo '<p class="meta post">posted on '.$new_date.'</p>';
                    echo '<p><a href="'.$url.'" class="button">Read more</a></p>';
                    echo '</div>';
                            
                   
                    
                   
                   
                }
                
                
                if( !is_front_page() )
                
                    if( $postcount > $postsperpage ) nav($curpage, $numpages);
                
            }
  
        
        function nav($curpage, $numpages){
        
        
        $next = $curpage - 1;
        $previous = $curpage + 1;
        //$numpages = 4;
        
        echo'
        <div class="uk-width-1-1">
        <nav class="navigation posts-navigation" role="navigation">
        	<h2 class="screen-reader-text">Posts navigation</h2>
        	<div class="nav-links">';
        	    
        if( $previous <= $numpages )
        {
            echo '<div class="nav-previous"><a href="'.home_url('/news?pg='.$previous).'">Older posts</a></div>';    
        }
        
        if( $next >= 1 )
        {
            echo '<div class="nav-next"><a href="'.home_url('/news?pg='.$next).'">Newer posts</a></div>';
        }
        		
        		
        echo '</div>
        
        </nav>
        </div>';
        
        
        
    }
    
;?>



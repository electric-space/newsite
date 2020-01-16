<?php 

/**
 * Header nav used for scrolling.
 * Also contains off-screen nav for mobiles
 *
 */  ;?>


<nav id="site-navigation" class="uk-width-xlarge-8-10 main-navigation" role="navigation">
            			
	<?php // CHANGE MENU FOR HOMEPAGE FOR SCROLLING

    // get menu
    $locations = get_nav_menu_locations();
    $menu_id = $locations['menu-1'];
    $menus = wp_get_nav_menu_items( $menu_id );
    $homeid = 4; ?>
    
    <ul id="menu-main-navigation" class="header-nav uk-hidden-small nav uk-flex uk-flex-middle uk-flex-space-between uk-flex-wrap" data-uk-scrollspy-nav="{closest:'li' }">

        <?php
            $menu_items = '';
            foreach( $menus as $menu )
            {   
                //  print_r($menu);
                
                if( $menu->object_id == $homeid  )
                {
                    $menu_items .= '<li '.$class.'><a href="#home">'.$menu->title.'</a></li>';    
                }
                else
                {   
                    $link = explode( '/', $menu->url );
                    $link = $link[count($link)-2];
                    $menu_items .= '<li><a href="#'.$link.'" data-uk-smooth-scroll>'.$menu->title.'</a></li>';

                }
            
            };
            
        echo $menu_items; ?>
        
    </ul>
    
    
    
    <a href="#offcanvas" class="uk-float-right uk-navbar-toggle uk-visible-small" data-uk-offcanvas="{mode:'slide'}" ></a>
    
</nav><!-- #site-navigation -->
            		
            		
            		
            		
            		
	<!-- This is the off-canvas sidebar -->
    <div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <a href="#offcanvas" class="uk-float-right uk-navbar-toggle uk-hidden-large" data-uk-offcanvas="{mode:'slide'}" ></a>

            <ul id="menu-main-navigation">
                <?php echo $menu_items ;?>
            </ul>
         
			    
        </div>
    </div>
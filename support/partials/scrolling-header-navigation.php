<?php

/**
 * Header nav used for scrolling.
 * Also contains off-screen nav for mobiles
 *
 */

;?>


<nav id="site-navigation" class=" main-navigation" role="navigation">

    <?php // CHANGE MENU FOR HOMEPAGE FOR SCROLLING

    // get menu
    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_menu'];
    $menus = wp_get_nav_menu_items( $menu_id );
    $homeid = 18; ?>

    <ul id="primary-menu" class="menu uk-flex uk-flex uk-flex-between uk-visible@m">

        <?php
            $menu_items = '';
            foreach( $menus as $menu ){

                //print_r($menu);

                //check if on homepage

                if( is_front_page() ):

                    //check if custom
                    if( $menu->object == 'custom' ){
                        $menu_items .= '<li><a href="#'.$menu->post_name.'" uk-scroll>'.$menu->title.'</a></li>'."\n";
                    }elseif( $menu->object == 'page' ){
                        $menu_items .= '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>'."\n";
                    };

                else:

                    //check if custom
                    if( $menu->object == 'custom' ){
                        $menu_items .= '<li '.get_current_page($menu->title).'><a href="'.home_url().$menu->url.'">'.$menu->title.'</a></li>'."\n";
                    }elseif( $menu->object == 'page' ){
                        $menu_items .= '<li '.get_current_page($menu->title).'><a href="'.$menu->url.'">'.$menu->title.'</a></li>'."\n";
                    };

                endif;

            };

        echo $menu_items; ?>

    </ul>


</nav><!-- #site-navigation -->

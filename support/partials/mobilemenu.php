<!-- This is the off-canvas sidebar -->


<a href="#offcanvas-overlay" uk-toggle uk-icon="icon: menu" class="open-menu uk-hidden@m"></a>

<div id="offcanvas-overlay" uk-offcanvas>
    
    <div class="uk-offcanvas-bar">

        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => '',
				'container'      => '',
				'menu_class'     => 'mobile-menu'
			) );?>
    </div>
</div>
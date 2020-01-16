<!-- This is the off-canvas sidebar -->
<a href="#mobile-nav" data-uk-offcanvas="{mode:'slide'}" class="uk-navbar-toggle uk-visible-small mobile-open"></a>

<div id="mobile-nav" class="uk-offcanvas">
<a href="#mobile-nav" data-uk-offcanvas="{mode:'slide'}" class="uk-navbar-toggle uk-visible-small mobile-close"></a>

    <div class="uk-offcanvas-bar">
        <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => '',
				'container'      => '',
				'menu_class'          => 'mobile-menu'
			) );?>
	
    </div>
</div>
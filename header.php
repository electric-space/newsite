<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package newsite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<script>
    //removes no-js class and adds visible class to fade page up
    var el = document.body.parentNode, bdy = document.body;
    bdy.classList.add('hidden'); el.classList.remove('no-js'); el.classList.add('js');
</script>

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'newsite' ); ?></a>

    <header id="masthead" class="site-header">

        <div class="uk-container">

            <div class="uk-grid uk-flex uk-flex-middle" uk-grid>

                <div class="uk-width-1-4@m uk-width-1-2">

                    <div class="site-branding uk-flex uk-flex-middle">

                        <?php the_custom_logo();?>

                        <?php
                            $newsite_description = get_bloginfo( 'description', 'display' );
                            if ( $newsite_description || is_customize_preview() ) :?>
                                <p class="site-description"><?php echo $newsite_description; /* WPCS: xss ok. */ ?></p>
                        <?php endif; ?>

                    </div><!-- .site-branding -->
                </div>

                <div class="uk-width-expand">
                    <nav id="site-navigation" class="main-navigation uk-flex  uk-flex-middle uk-flex-right">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'container'      => '',
                            'menu_class'     => 'menu  uk-visible@m'
                        ) );
                        ?>

                        <?php get_template_part('support/partials/mobilemenu') ;?>


                    </nav><!-- #site-navigation -->
                </div>

            </div>

        </div>

    </header><!-- #masthead -->

    
    <?php get_template_part('support/partials/slideshow-uikit') ;?>


    <main id="main" class="site-main" uk-height-viewport="expand: true">

        <div class="uk-container">
            
            <div class="uk-grid" uk-grid>



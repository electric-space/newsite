<?php

/**
 * Extra functions for functions.php
 */

 
/**
 * Load files.
 */
 
require 'acf_fields.php';
require 'register-shortcodes.php';



/**
 * Get id by slug
 * Usage: get_id('{page-slug}')
 */

function get_id($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
} 


/**
 * Get ID by URL
 */

function get_id_url(){
    $url = '//' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
    $current_postid = url_to_postid( $url );
    
    return $current_postid;
}

/**
 * Current page highlight
 * $args (the post/page ID)
 */

function get_current_page($args){

    $id = get_id_url();

    if( $args == $id ){
        return 'class="current_page_item"';
    }else{
        return null;
    }

}


/* 
 * Get file mod date to add to css as query string to help with cache
 * Usage, call esmod_date({filename})
 * Default {style.css}
 */
     
function esmod_date($file="style.css"){
    if( $file){
        clearstatcache();
        $file = get_template_directory().'/'.$file;
        $lastModifiedTimestamp = filemtime($file);
        $lastModifiedDatetime = date("Ymdi", $lastModifiedTimestamp);
        return $lastModifiedDatetime;
    }
    
}





/**
 * Make grid wrapper
 * usage: gridwrapper({open/close, class})
 */

function gridwrapper($args=0){
    
    if( count($args) > 1 )
        $class = $args[1];
    else
        $class = '';
   
    
    if( $args[0] == 'open' ){
        $grid = '<div class="uk-container '.$class.'">';
        $grid .= '<div class="uk-grid" uk-grid>';
    }
    
    if( $args[0] == 'close' ){
        $grid = '</div>';
        $grid .= '</div>';
    }
    
    echo $grid;
    

}



/**
 * This adds uikit classes to main navigation dropdown
 */

class dropdown_menu extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='uk-navbar-dropdown' uk-drop='delay-hide: 200'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}







/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/plugin_packages/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // This is an example of how to include a plugin pre-packaged with a theme.
        array(
            'name'               => 'ACF Pro ', // The plugin name.
            'slug'               => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/support/plugin_packages/advanced-custom-fields-pro.zip', // The plugin source.
            'required'           => false, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),



        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Force Regenerate Thumbnails',
            'slug'      => 'force-regenerate-thumbnails',
            'required'  => false,
        ),
        
        array(
            'name'      => 'Yoast SEO',
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),
        
        array(
            'name'      => 'WP Compiler',
            'slug'      => 'wp-compiler',
            'required'  => false,
        ),
        
        array(
            'name'      => 'WP Statistics',
            'slug'      => 'wp-statistics',
            'required'  => false,
        ),
        array(
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'required'  => false,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}





/**
 * Setup theme options
 *
 */
 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
		));
	
}



/**
 * Clean the head.
 */
 
 function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
}
add_action('init', 'removeHeadLinks');
 
 
 
/**
 * Change login logo.
 */
 
function my_login_head() {
    
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    
    if( $image[0] ){
        $logo = "background-image: url('$image[0]');";
    }else{
        $logo = '';
    }
    
    
	echo "
	<style>
	
	body{
        background-color:#fff;
    }
    
	body.login #login h1 a {
		".$logo."
		background-repeat: no-repeat;
		width: 100%;
		margin:0 0 15px 0;
        background-size:contain;
	}

	</style>
	";
}

add_action("login_head", "my_login_head");



/**
 * Removes the embeded posts option
 */

function my_deregister_scripts(){
 wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );



/**
 * Adds content editor to News page
 */
 
add_action( 'edit_form_after_title', 'rgc_posts_page_edit_form' );
function rgc_posts_page_edit_form( $post ) {
	$posts_page = get_option( 'page_for_posts' );
	if ( $posts_page === $post->ID ) {
		add_post_type_support( 'page', 'editor' );
	}
}





/**
 * Adds colours to editor
 */

function my_mce4_options($init) {

    $custom_colours = '
        "0071b9", "Blue",
        "5f6a72", "Grey",
        "ccced0", "Grey Light",
        "2d2d2d", "Grey Mid",
        "5f6a72", "Grey Dark",
        "e77c78", "Pink",
        "000000", "Black",
        "f0f0f0", "White"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 4;

    return $init;
}

add_filter('tiny_mce_before_init', 'my_mce4_options');




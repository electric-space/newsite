<?php 

/* Remove woo wrappers */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


/* add custom wrappers */
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
    echo '<div class="uk-width-expand@m uk-align-center uk-margin-remove-bottom uk-flex-last@m">';
}

function my_theme_wrapper_end() {
    echo '</div>';
}


/**
 * Use these wrappers for a sidebar when the page doesnt have the opening uk-container set
 
    function my_theme_wrapper_start() {
        echo '<div class="uk-container">
                <div class="uk-grid" uk-grid>
                    <div class="uk-width-expand@m uk-align-center uk-margin-remove-bottom uk-flex-last@m">';
    }
    
    function my_theme_wrapper_end() {
        echo '</div>';
        get_sidebar('shop');
        echo '</div>
            </div>';
    }
 
*/













/**
 * Get product info on single product page 
 *  global $product;
 *  $terms = get_the_terms( $product->get_id(), 'product_cat' );
 *  $catid = $terms[0]->term_id;
 *  $catslug = $terms[0]->slug;
 */



/**
 * Custom query on products
 */



$args = array(
    'post_type' => 'product',
    'posts_per_page' => 4,
    
    'tax_query' => array(
        'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => '{category}',
            ),
            array(
                'taxonomy' => 'product_visibility',
                'field'    => 'slug',
                'terms'    => 'featured',
            ),
        ),
    );
    
$query = new WP_Query( $args );
    










/**
 * Change order order of title and breadcrumb
 */
//remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
//add_action( 'woocommerce_archive_description', 'woocommerce_breadcrumb', 30 );







/**
 * Filter WooCommerce  Search Field
 *
 */
 
add_filter( 'get_product_search_form' , 'me_custom_product_searchform' );

function me_custom_product_searchform( $form ) {
	
    $form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
                <div>
                    <label class="screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
                    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Product search', 'woocommerce' ) . '" />

                    <input type="hidden" name="post_type" value="product" />
                </div>
            </form>';

    return $form;


}

add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );




/**
 * remove short description meta field
 */
 
function remove_short_description() {
    remove_meta_box( 'postexcerpt', 'product', 'normal');
}

add_action('add_meta_boxes', 'remove_short_description', 999); 
 
 
 
/**
 * Remove Tabs
 */

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );








/**
 * @snippet       Add next/prev buttons @ WooCommerce Single Product Page
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=20567
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 2.5.5
 */
 
//add_action( 'woocommerce_before_single_product', 'bbloomer_prev_next_product' );
 
// and if you also want them at the bottom...
add_action( 'woocommerce_after_single_product', 'bbloomer_prev_next_product' );
 
function bbloomer_prev_next_product(){
 
echo '<div class="prev_next_buttons uk-grid uk-child-width-1-2" uk-grid>';

    echo '<div class="prev">';
        next_post_link('%link', '&larr; PREVIOUS', TRUE, ' ', 'product_cat');
    echo '</div>';
    
    echo '<div class="next uk-text-right">';
        previous_post_link('%link', 'NEXT &rarr;', TRUE, ' ', 'product_cat');
    echo '</div>';
 
    
     
echo '</div>';
         
}


/**
 * change url of breadcrumb
 */

add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );

function woo_custom_breadrumb_home_url() {
    return home_url().'/shop/';
}






/**
* @snippet       Remove "Default Sorting" Dropdown @ WooCommerce Shop & Archive Pages
* @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
* @source        https://businessbloomer.com/?p=401
* @author        Rodolfo Melogli
* @compatible    Woo 3.5.2
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/
 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );





/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();

	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}

	return ! empty( $free ) ? $free : $rates;
}

add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );





    
// Disable WooCommerce's Default Stylesheets
function disable_woocommerce_default_css( $styles ) {

  // Disable the stylesheets below via unset():
  //unset( $styles['woocommerce-general'] );  // Styling of buttons, dropdowns, etc.
  // unset( $styles['woocommerce-layout'] );        // Layout for columns, positioning.
  //unset( $styles['woocommerce-smallscreen'] );   // Responsive design for mobile devices.

  return $styles;
}
add_action('woocommerce_enqueue_styles', 'disable_woocommerce_default_css');
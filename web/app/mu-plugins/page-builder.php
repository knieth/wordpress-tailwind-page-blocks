<?php
/**
 * Plugin Name: iation
 * Description:  An autoloader that enables standard plugins to be required just like must-use plugins. The autoloaded plugins are included during mu-plugin loading. An asterisk (*) next to the name of the plugin designates the plugins that have been autoloaded.
 */

/**
* Place ACF JSON in field-groups directory
*/
add_filter('acf/settings/save_json', function ($path) {
    return dirname(__FILE__) . '/page-builder/field-groups';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = dirname(__FILE__) . '/page-builder/field-groups';
    return $paths;
});

/**
* Custom ACF Toolbar
*/
add_filter( 'acf/fields/wysiwyg/toolbars' , 'links_and_list_toolbar'  );
function links_and_list_toolbar( $toolbars )
{
	$toolbars['List and Link' ] = array();
	$toolbars['List and Link' ][1] = array('link' , 'bullist' );

	if( ($key = array_search('code' , $toolbars['Full' ][2])) !== false )
	{
	    unset( $toolbars['Full' ][2][$key] );
	}

	return $toolbars;
}

/**
 * My Account Orders Table
 * Remove actions column
 * Add Quantity Column
 */
add_filter( 'woocommerce_account_orders_columns', 'orders_remove_action_column' );
function orders_remove_action_column( $columns = array() ) {

    // Hide the columns
    if( isset($columns['order-actions']) ) {
        // Unsets the columns which you want to hide
		unset( $columns['order-total'] );
		unset( $columns['order-actions'] );
    }

	$columns['order-quantity'] = 'Quantity';
	$columns['order-total'] = 'Total';

    return $columns;
}

/**
 * Prevent successful password changed email from sending
 */
if (!function_exists('wp_password_change_notification')) {
    function wp_password_change_notification($user) {
        return;
    }
}

/**
 * Allow uploading of svg to wordpress media
 */
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

  }, 10, 4 );

add_filter( 'upload_mimes', 'cc_mime_types' );
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_action( 'admin_head', 'fix_svg' );
function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
        </style>';
}

function override_admin_dashboard_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/assets/styles/admin.css');
}
add_action('admin_enqueue_scripts', 'override_admin_dashboard_style');

/**
 * Modify my accounts page to have the wishlist tab
 */
add_filter ( 'woocommerce_account_menu_items', 'modify_links', 40 );
function modify_links( $menu_links ){

    $menu_links['dashboard'] = "Account dashboard";

	$menu_links = array_slice( $menu_links, 0, 5, true ) 
	+ array( 'my-wishlist' => 'Wishlist' )
	+ array_slice( $menu_links, 5, NULL, true );
 
    unset($menu_links['customer-logout']);

    asort($menu_links);

    $menu_links['customer-logout'] = "Logout";

	return $menu_links;
}


add_action( 'init', 'add_endpoint' );
function add_endpoint() {
	add_rewrite_endpoint( 'my-wishlist', EP_PAGES );

}

add_action( 'woocommerce_account_my-wishlist_endpoint', 'my_account_wishlist_endpoint_content' );
function my_account_wishlist_endpoint_content() {
	echo \App\template('woocommerce.myaccount.wishlist');
}

add_filter('woocommerce_catalog_orderby', 'wc_customize_product_sorting');

function wc_customize_product_sorting($sorting_options){
    $sorting_options = [
        'menu_order' => __( 'Sorting', 'woocommerce' ),
        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
        'rating'     => __( 'Sort by average rating', 'woocommerce' ),
        'date'       => __( 'Sort by date', 'woocommerce' ),
        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
    ];

    return $sorting_options;
}
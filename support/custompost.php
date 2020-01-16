<?php 




// Register Custom Post Type
function custom_post_type() {
	
	$txtdomain = 'newsite';

	$labels = array(
		'name'                  => _x( 'Directors', 'Post Type General Name', $txtdomain ),
		'singular_name'         => _x( 'Director', 'Post Type Singular Name', $txtdomain ),
		'menu_name'             => __( 'Directors', $txtdomain ),
		'name_admin_bar'        => __( 'Post Type', $txtdomain ),
		'archives'              => __( 'Item Archives', $txtdomain ),
		'attributes'            => __( 'Item Attributes', $txtdomain ),
		'parent_item_colon'     => __( 'Parent Item:', $txtdomain ),
		'all_items'             => __( 'All Items', $txtdomain ),
		'add_new_item'          => __( 'Add New Item', $txtdomain ),
		'add_new'               => __( 'Add New', $txtdomain ),
		'new_item'              => __( 'New Item', $txtdomain ),
		'edit_item'             => __( 'Edit Item', $txtdomain ),
		'update_item'           => __( 'Update Item', $txtdomain ),
		'view_item'             => __( 'View Item', $txtdomain ),
		'view_items'            => __( 'View Items', $txtdomain ),
		'search_items'          => __( 'Search Item', $txtdomain ),
		'not_found'             => __( 'Not found', $txtdomain ),
		'not_found_in_trash'    => __( 'Not found in Trash', $txtdomain ),
		'featured_image'        => __( 'Featured Image', $txtdomain ),
		'set_featured_image'    => __( 'Set featured image', $txtdomain ),
		'remove_featured_image' => __( 'Remove featured image', $txtdomain ),
		'use_featured_image'    => __( 'Use as featured image', $txtdomain ),
		'insert_into_item'      => __( 'Insert into item', $txtdomain ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', $txtdomain ),
		'items_list'            => __( 'Items list', $txtdomain ),
		'items_list_navigation' => __( 'Items list navigation', $txtdomain ),
		'filter_items_list'     => __( 'Filter items list', $txtdomain ),
	);
	$args = array(
		'label'                 => __( 'Director', $txtdomain ),
		'description'           => __( 'Post Type Description', $txtdomain ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'directors', $args );

}
add_action( 'init', 'custom_post_type', 0 );
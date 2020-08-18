<?php

//ajax localise
function pvn_load_scripts() {
	wp_enqueue_script('pw1-script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array('jquery'));
	wp_localize_script('pw1-script', 'pvn_script_vars', array(
	  'ajaxurl' => admin_url('admin-ajax.php'),
	  'siteurl' => get_stylesheet_directory_uri(),
	  'security' => wp_create_nonce('var'),
	)); 
  }
add_action('wp_enqueue_scripts', 'pvn_load_scripts');


add_action('wp_ajax_pvn_function_posts', 'pvn_function_posts');
add_action('wp_ajax_nopriv_pvn_function_posts', 'pvn_function_posts');

function pvn_function_posts() {
	check_ajax_referer('var', 'security');

	$result['success'] = false;
	$result['data'] = [
		'message' => 'Network error.',
    ];

    if (/* Condition...*/) {
    	wp_send_json_success( $result );
    }
    wp_send_json_error( $result );
}

/**
* Code for create custom post type / custom module in wordpress
* write below line of code in your theme's functions.php file
*/

// Register Custom Post Type
function register_testimonials_module() {

	$labels = array(
		'name'                  => 'Testimonials',
		'singular_name'         => 'Testimonial',
		'menu_name'             => 'Testimonials',
		'name_admin_bar'        => 'Testimonial',
		'archives'              => 'Testimonial Archives',
		'attributes'            => 'Item Attributes',
		'parent_item_colon'     => 'Parent Item:',
		'all_items'             => 'All Items',
		'add_new_item'          => 'Add New Item',
		'add_new'               => 'Add New',
		'new_item'              => 'New Item',
		'edit_item'             => 'Edit Item',
		'update_item'           => 'Update Item',
		'view_item'             => 'View Item',
		'view_items'            => 'View Items',
		'search_items'          => 'Search Item',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Items list',
		'items_list_navigation' => 'Items list navigation',
		'filter_items_list'     => 'Filter items list',
	);
	$args = array(
		'label'                 => 'Testimonial',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'testimonials_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'		=> true,	// To use Gutenberg editor.
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'testimonials', $args );
}
add_action( 'init', 'register_testimonials_module', 0 );

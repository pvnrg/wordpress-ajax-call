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
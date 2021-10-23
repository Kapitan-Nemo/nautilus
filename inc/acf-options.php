<?php
/** 
 * Add support for ACF Theme options
 */
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Nautilius',
		'menu_title'	=> 'Nautilius',
		'menu_slug' 	=> 'nautilius-options',
		'capability'	=> 'edit_posts',
        'redirect'		=> false,
        'icon_url'      => 'dashicons-hammer',
		'position' => '80.1'
	));
}

function my_acf_init() {
    if( function_exists('acf_add_options_page') ) {	

    }
}
add_action('acf/init', 'my_acf_init');
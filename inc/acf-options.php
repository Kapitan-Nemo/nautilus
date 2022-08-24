<?php
/** 
 * Add support for ACF Theme options
 */
if ( function_exists( 'acf_add_options_page' ) ) { 
	acf_add_options_page(
		array(
			'page_title'      => 'Nautilus',
			'menu_title'      => 'Nautilus',
			'menu_slug'       => 'nautilus',
			'capability'      => 'edit_posts',
			'redirect'        => false,
			'icon_url'        => 'dashicons-carrot',
			'position'        => '80.1',
			'updated_message' => __( 'Done!', 'acf' ),
		)
	);
}

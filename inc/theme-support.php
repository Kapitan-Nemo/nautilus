<?php 
/**
 * Add support for native WordPress title tag management 
 */
add_theme_support( 'title-tag' );

/** 
 * Add support for thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add support for scripts & styles type (HTML5 validation)
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'html5', array( 'script', 'style' ) );
	}
);

/**
 * Add support for SVG files - Upload 
 */
function my_myme_types( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	return $mime_types;
}
add_filter( 'upload_mimes', 'my_myme_types', 1, 1 );


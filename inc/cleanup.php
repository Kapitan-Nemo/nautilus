<?php 
/*** Remove WP Version from CSS and JS files ***/
function nautilus_remove_wp_version_strings( $src ) {
	global $wp_version;
	parse_str( wp_parse_url( $src, PHP_URL_QUERY ), $query );
	if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'nautilus_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'nautilus_remove_wp_version_strings' );

/*** Remove WP Version from header ***/
function nautilus_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'nautilus_remove_meta_version' );

/*** Disable WordPress build in code editor ***/
define( 'DISALLOW_FILE_EDIT', true );

/*** Clean WordPress from default enqueues (e.g. emojis etc.) ***/
add_filter( 'emoji_svg_url', '__return_false' );
add_action(
	'wp_footer',
	function () {
		wp_dequeue_script( 'wp-embed' );
	}
);
add_action(
	'wp_print_styles',
	function () {
		wp_dequeue_style( 'wp-block-library' );
	}
);
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'rest_output_link_wp_head' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'rel_canonical' );

/*** Disable inserting blank paragraphs in Contact Form 7 ***/
add_filter( 'wpcf7_autop_or_not', '__return_false' );

/*** Disable Gutenberg Block Editor ***/
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

/*** Dequeue Gutenberg stylesheets ***/
function remove_block_css() {
	wp_dequeue_style( 'wp-block-library' ); // WordPress core
	wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
}

/*** Remove WP Color Inline Styles  ***/
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

/* Disable Gutenberg Inline CSS Styles and SVG Duotone Filters from Header (WordPress 5.9+) */
function wp_deregister_styles() {
	wp_dequeue_style( 'global-styles' ); // Remove Inline CSS Styles
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' ); // Remove SVG Duotone Filters
}
	add_action( 'wp_enqueue_scripts', 'wp_deregister_styles', 100 );

/*** Disable WP Admin Bar ***/
show_admin_bar( false );

/*** Completely Remove jQuery From WordPress ***/
function nautilus_jquery_remove() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', false );
	}
}
add_action( 'init', 'nautilus_jquery_remove' );


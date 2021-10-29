<?php 
/**
 * Remove WP Version from CSS and JS files
 */
function nautilius_remove_wp_version_strings( $src ) {
	global $wp_version;
	parse_str( wp_parse_url( $src, PHP_URL_QUERY ), $query );
	if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'nautilius_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'nautilius_remove_wp_version_strings' );

/**
 * Remove WP Version from header
 */
function nautilius_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'nautilius_remove_meta_version' );

/**
 * Disable WordPress build in code editor
 */
define( 'DISALLOW_FILE_EDIT', true );

/** 
 * Clean wordpress from default enqueues (e.g. emojis etc.)
 */
add_filter('emoji_svg_url', '__return_false');
add_action('wp_footer', function () {
	wp_dequeue_script('wp-embed');
});
add_action('wp_print_styles', function () {
	wp_dequeue_style('wp-block-library');
});
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rel_canonical');

/** 
 * Disable inserting blank paragraphs in Contact Form 7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/** 
 * Disable Gutenberg Block Editor
 */
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post_type', '__return_false', 10);
add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );

/** 
 * Dequeue Gutenberg stylesheets
 */
function remove_block_css() {
    wp_dequeue_style( 'wp-block-library' ); // Wordpress core
    wp_dequeue_style( 'wp-block-library-theme' ); // Wordpress core
}

/** 
 * Disable WP Admin Bar
 */
show_admin_bar(false);


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'template-parts/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}
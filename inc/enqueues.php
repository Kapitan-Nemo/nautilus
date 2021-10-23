<?php
/** 
 * Add custom jQuery (v. 3.6.0)
 */
function custom_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', get_theme_file_uri( '/assets/dist/js/global/jquery-3.6.0.min.js' ), false, '3.6.0', false );
    wp_enqueue_script( 'jquery' );

}
add_action( 'wp_enqueue_scripts', 'custom_jquery' );

/** 
 * Add theme styles & script
 */
function nautilius_enqueue_scripts() {
	wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/assets/dist/css/style.css', '', time());
    wp_enqueue_script( 'theme-scripts', get_theme_file_uri( '/assets/dist/js/global/theme.min.js' ), array('jquery'), time(), true );
}
add_action( 'wp_enqueue_scripts', 'nautilius_enqueue_scripts' );



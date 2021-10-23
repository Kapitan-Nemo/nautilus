<?php 
/** 
 * Add support for native Wordpress title tag management 
 */
add_theme_support( 'title-tag' );

/** 
 * Add support for thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 * Add support for scripts & styles type (HTML5 validation)
 */
add_action( 'after_setup_theme', function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);



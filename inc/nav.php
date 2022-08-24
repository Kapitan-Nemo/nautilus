<?php
function register_my_menus() {
	register_nav_menus(
		array(
			'navigation' => __( 'Główna nawigacja' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );
/**
 * Additional class on li element
 */
function add_additional_class_on_li( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );


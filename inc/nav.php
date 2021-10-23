<?php 
/**
 * Register navigation
 */
function register_my_menus() {
    register_nav_menus(
        array(
            'navigation' => __( 'Główna nawigacja' ),
            'navigation_mobile' => __( 'Mobilna nawigacja' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );

/**
 * Additional class on li element
 */
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// Add to last position WP Menu  -  Menu Categories
add_filter( 'wp_nav_menu_items','add_menu', 10, 2 );
function add_menu( $items, $args ) {
   if ( $args->theme_location == 'navigation' ) {
        $items .= '<li class="navbar__nav-icon-menu navbar__nav-icon navbar__nav-item toggle"><label class="nav-menu" for="nav-menu-input"></label></li>';
        return $items;
   }
   else {
    return $items;
   }
} 


//Add to last position WP Menu  - Ajax Search
add_filter( 'wp_nav_menu_items','add_ajax_search', 10, 2 );
function add_ajax_search( $items, $args ) {
   if( $args->theme_location == 'navigation' ) {
        $items .= '<li onclick="openSearch()" class="navbar__nav-icon-search navbar__nav-icon navbar__nav-item"><label class="nav-search" for="nav-search-input"></label></li>';
        return $items;
   } else {
    return $items;
   }
}


//Add to last position WP Mobile Menu  - Close Mobile Menu button
add_filter( 'wp_nav_menu_items','add_menu_close', 10, 2 );
function add_menu_close( $items, $args ) {
   if( $args->theme_location == 'navigation_mobile' ) {
        $items .= '<i onclick="closeMenu()" class="icon icon-close"></i>';
        return $items;
   } else {
    return $items;
   }
}

//Add to last position WP Mobile Menu  - Image
add_filter( 'wp_nav_menu_items','add_menu_image', 10, 2 );
function add_menu_image( $items, $args ) {
   if( $args->theme_location == 'navigation_mobile' ) {
        $site_url = get_site_url(); 
        $items .= '<img width="150" height="150" class="img-fluid" src=" '. $site_url .'/wp-content/uploads/2021/10/droga-removebg-preview-e1634756555105.png" alt="Szukaj" title="Szukaj"  />';
        return $items;
   } else {
    return $items;
   }
}

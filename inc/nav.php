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
        $items .= '<li class="navbar__nav-icon-menu navbar__nav-icon navbar__nav-item toggle"><label class="nav-menu"></label></li>';
        return $items;
   }
   else {
    return $items;
   }
} 

//Add to last position WP Menu  - Facebook link
add_filter( 'wp_nav_menu_items','add_facebook', 10, 2 );
function add_facebook( $items, $args ) {
   if( $args->theme_location == 'navigation' ) {
        $items .= '<li class="navbar__nav-icon-facebook navbar__nav-icon navbar__nav-item"><a class="nav-facebook" href="https://www.facebook.com/koszalindladzieci/"></a></li>';
        return $items;
   } else {
    return $items;
   }
}

//Add to last position WP Menu  - Ajax Search
add_filter( 'wp_nav_menu_items','add_ajax_search', 10, 2 );
function add_ajax_search( $items, $args ) {
   if( $args->theme_location == 'navigation' ) {
        $items .= '<li onclick="openSearch()" class="navbar__nav-icon-search navbar__nav-icon navbar__nav-item"><label class="nav-search"></label></li>';
        return $items;
   } else {
    return $items;
   }
}


//Add to last position WP Mobile Menu  - Close Mobile Menu button
add_filter( 'wp_nav_menu_items','add_menu_close', 10, 2 );
function add_menu_close( $items, $args ) {
   if( $args->theme_location == 'navigation_mobile' ) {
        $items .= '<li><i class="icon icon-close"></i></li>';
        return $items;
   } else {
    return $items;
   }
}

//Add to last position WP Mobile Menu  - Image
add_filter( 'wp_nav_menu_items','add_menu_image', 10, 2 );
function add_menu_image( $items, $args ) {
   if( $args->theme_location == 'navigation_mobile' ) {
        $site_url = get_template_directory_uri(); 
        $items .= '<li><img width="150" height="150" class="img-fluid" src=" '. $site_url .'/assets/dist/img/png/menu.png" alt="Menu" title="Menu"  /></li>';
        return $items;
   } else {
    return $items;
   }
}

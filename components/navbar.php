<div class="navbar container-fluid pt-5 p-relative">
    <a href="<?php echo get_home_url(); ?>">
        <img class="img-fluid navbar__logo" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/logo.png" width="157" height="196" alt="Logo Koszalin Dla Dzieci" />
    </a>
    
    <?php
    /** Display main theme navigation */
    wp_nav_menu(
        array(
            'theme_location' => 'navigation',
            'menu_class' => 'navbar__nav',
            'container' => false,
            'fallback_cb' => false,
            'add_li_class'  => 'navbar__nav-item',
            'menu_id' => 'primary-menu'
        )
    ); ?>

    <?php
    /** Display mobile theme navigation */
    wp_nav_menu(
        array(
            'theme_location' => 'navigation_mobile',
            'menu_class' => ' ',
            'container' => false,
            'fallback_cb' => false,
            'add_li_class'  => '',
            'menu_id' => 'mobile-menu'
        )
    ); ?>


    <div class="navbar__search">
        <span class="navbar__search__close icon icon-close" onclick="closeSearch()" title="Zamknij wyszukiwarkę"></span>
        <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete="off">
            <input type="text" name="s" placeholder="Wpisz czego szukasz..."  minlenght='3' class="navbar__search__input ajax-search" >
            <button class="navbar__search__button icon icon-search"></button>
        </form>
        <div class="navbar__search__result ">
            <ul class="ajax-results">

            </ul>
        </div>
    </div>
</div>


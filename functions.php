<?php

// Main switch to get fontend assets from a Vite dev server OR from production built folder
// it is recommeded to move it into wp-config.php
define( 'IS_VITE_DEVELOPMENT', false );


require get_template_directory() . '/inc/inc.vite.php';
require get_template_directory() . '/inc/enqueues.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/acf-options.php';
require get_template_directory() . '/inc/nav.php';

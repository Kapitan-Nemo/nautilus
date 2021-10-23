<?php
function ajax_search_enqueue_scripts() {
	
	/* hand the js for deleting uploads by ajax */
	wp_enqueue_script('ajax-search', get_theme_file_uri( '/assets/dist/js/global/ajax-search.min.js' ),array( 'jquery' ),'1.0.0',true);
	wp_localize_script(
		'ajax-search',
		'nautilius_search', // this is the name that prefixes the ajaxurl in our js file
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		)
	);
	
}

add_action( 'wp_enqueue_scripts', 'ajax_search_enqueue_scripts' );

function nautilius_ajax_search() {
	
	/* get the search terms entered into the search box */
	$search = sanitize_text_field( $_POST[ 'search' ] );
	
	/* run a new query including the search string */
	$q = new WP_Query(
		array(
			'post_type' => array('post', 'page'),
			'posts_per_page'	=> 10,
			's'					=> $search
		)
	);
	
	/* store all returned output in here */
	$output = '';
	/* check whether any search results are found */
	if( $q->have_posts() && strlen( $search ) >= 3 ) {

		/* loop through each result */
		while( $q->have_posts() ) : $q->the_post();
			/* add result and link to post to output */
			echo '<li><a onclick="closeSearch()" href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
		
		/* end loop */
		endwhile;
	
	/* no search results found */	
	} else {
		
		/* add no results message to output */
		echo 'error';
		
	} // end if have posts
	
	/* reset query */
	wp_reset_query();
	
	die();
	
}

add_action( 'wp_ajax_nautilius_search', 'nautilius_ajax_search' );
add_action( 'wp_ajax_nopriv_nautilius_search', 'nautilius_ajax_search' );
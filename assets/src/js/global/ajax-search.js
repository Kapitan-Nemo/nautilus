//TODO - REWRITE TO ES5

( function( $ ) {
	
	// hooks everything into document ready
	$(document).ready( function() {
		
		// create a function to actually fire the search
		function dosearch(t) {

	        // do the ajax request for search
			    $.ajax({
				    
				    type: 'post',
				    url: nautilius_search.ajaxurl, // the localized name of your file
				    data: {
					    action: 'nautilius_search', // the wp_ajax_ hook name
					      search: t
				    },
				
				    // what happens on success
				    success: function( result ) {

					    // if the ajax call returns no results
					    if( result === 'error' ) {
						    
						    // set the html of the element with the class to no results
						    $( '.ajax-results' ).html( '<li class="test">Ups...Niczego nie znaleziono :-( </li>' );
					        $('.ajax-results').addClass('active')
					    // we have results to display
					    } else {
						    // populate the results markup in the element with the class of ajax-results
						    $( '.ajax-results' ).html( result );
                            $('.ajax-results').addClass('active')
					    }

				    }
				
			    });
	        
	    }
	    
	    var thread = null;
	    
	    // when the keyboard press is relased in the input with the class ajax-search
	    $('.ajax-search').keyup(function() {
			  
			  // clear our timeout variable - to start the timer again
			  clearTimeout(thread);
			  
			  // set a variable to reference our current element ajax-search
			  var $this = $(this);
              $('.ajax-results').removeClass('active');
			  
			  // set a timeout to wait for a second before running the dosearch function
			  thread = setTimeout(
				  function() {
				  	dosearch($this.val())
				  },
				  1000
			  );
	    });
	});

	$(document).on('submit', '#searchform', function(event) {
		var searchValue = $('.ajax-search').val();
		if (searchValue.length == 0) {
			event.preventDefault();
			alert("Wpisz czego szukasz ;)")
		} 
	});
	
}) ( jQuery );
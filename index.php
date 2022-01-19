<?php
get_header(); ?>

<main id="swup" class="transition-fade blog-archive">
	<div class="container-fluid breadcrumbs">
		<div class="breadcrumbs__row row pt-5">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					if ( !is_front_page() ) {
						yoast_breadcrumb( '<p class="" id="breadcrumbs">','</p>' );
					}                 
				}
			?>
		</div>
	</div>
	<section class="blog-cards">
		<div class="container-fluid p-relative">
			<h2 class="section-heading text-center p-relative"> 			
				<?php if ( is_home() ) {
					single_post_title(); 
				} else {
					$cat = get_the_category($post->ID); echo $cat [0]->cat_name; } ?>
			</h2>
			<?php if ( is_home() ) {  
				$total = wp_count_posts()->publish; echo '<p class="blog-cards__category-count justify-content-center d-flex">'. $total . ' posty</p>';
			} else {
				echo '<p class="blog-cards__category-count justify-content-center d-flex">' . $cat [0]->category_count .' posty</p>'; 
			} ?> 
			<div class="row">	
				<?php
				if ( have_posts() ) :
					
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part('components/content', get_post_format());

					endwhile;


					// don't display the button if there are not enough posts
					misha_paginator( get_pagenum_link() );
				else:
					get_template_part('components/content', get_post_format());
				endif;
				?>
			</div>		
		</div>
	</section>
</main>

<?php get_footer();
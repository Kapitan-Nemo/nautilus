<div class="col-12 col-md-6 col-lg-4 mb-5">
	<div class="blog-cards__card">
		<?php if (has_post_thumbnail()):?>
			<div class="blog-cards__zoom blog-cards__scale">
				<a href="<?php the_permalink() ?>" >
					<?php echo get_the_post_thumbnail( $post->ID, array( 500, 500), array( 'class' => 'blog-cards__img img-fluid ' ) ); ?> 
				</a>   
			</div>
		<?php endif; ?>
			<div class="blog-cards__body">
				<a href="<?php the_permalink() ?>" >
					<h3><?php the_title(); ?></h3>
					<p><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
				</a> 
				<div class="blog-cards__footer">   
					<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>		
				<?php $category = get_the_category();  ?>
					<?php if (!empty($category)) : ?>
					<?php echo '<a class="blog-cards__footer__link" href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.' <i class="icon icon-chevron-right"></i>  </a>';   ?>
				<?php else : ?>

				<?php endif;  ?>
			</div>
		</div>
	</div>
</div>
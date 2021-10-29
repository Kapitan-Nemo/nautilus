<section class="blog-cards">
    <div class="container-fluid p-relative">
        <h2 class="section-heading">Blog</h2>
       <!-- <img class="blog-cards__scribbble" src="<?php // echo get_template_directory_uri(); ?>/assets/dist/img/svg/scribbbles/61.svg" alt="" title=""/> -->
        <div class="row justify-content-center">
          <?php
              $args = array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 4,
              );
              $arr_posts = new WP_Query( $args );
              if ($arr_posts->have_posts()) :
              while ($arr_posts->have_posts()) : $arr_posts->the_post()
            ?>
          <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xxl-3 mb-5">
              <div class="blog-cards__card">
                  <?php if (has_post_thumbnail()):?>
                    <div class="blog-cards__zoom blog-cards__scale">
                      <a href="<?php the_permalink() ?>">
                        <?php echo get_the_post_thumbnail( $post->ID, array( 500, 500), array( 'class' => 'blog-cards__img img-fluid ' ) ); ?>   
                      </a>  
                    </div>
                  <?php endif; ?>
                  <div class="blog-cards__body">
                      <a href="<?php the_permalink() ?>">
                        <h3 class=""><?php the_title(); ?></h3>
                        <p><?php echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
                      </a>
                      <div class="blog-cards__footer">   
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                        <?php $category = get_the_category(); 
                          echo '<a class="blog-cards__footer__link" href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.' <i class="icon icon-chevron-right"></i></a>'; ?>         
                      </div>
                  </div>
              </div>
          </div>

          <?php endwhile ?>
          <?php else :?>
            <div class="col-12 text-center">
              <h2 class="">Brak postów do wyswietlenia!</h2>
              <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>assets/dist/img/No_posts_to_display.gif" alt="Brak postów do wyswietlenia" title="Brak postow do wyswietlenia"/>
            </div>
          <?php endif; wp_reset_postdata();?>

        </div>
    </div>
</section>
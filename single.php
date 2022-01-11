<?php get_header(); ?>
    <main id="swup" class="transition-fade blog-single">
        <div class="container-fluid breadcrumbs">
            <div class="breadcrumbs__row row no-gutters pt-5">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        if ( !is_front_page() ) {
                            yoast_breadcrumb( '<p class="" id="breadcrumbs">','</p>' );
                        }                 
                    }
                ?>
            </div>
        </div>
        <div class="container-fluid mb-5 mb-lg-1">
            <div class="row">
                <h1 class="blog-single__heading"><?php the_title( ) ?></h1>
            </div>
            <div class="row blog-single__hero">
                <div class="blog-single__info col-12 d-inline-flex justify-content-between">
                    <p class="blog-single__info__time">Opublikowano <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?> | <?php echo get_the_time(); ?></time></span>
                    <p class="blog-single__info__categories">  
                        <?php
                            $categories =  get_the_category();
                            foreach  ($categories as $category) {
                                echo ' <a href='. get_category_link( $category->term_id ) .'> <span>|</span> '. $category->cat_name .'</a>';
                            }
                        ?>
                    </span>
                </div>
            </div>
        </div>   
        <?php the_post_thumbnail( 'full', array( 'class' => 'mx-auto img-fluid blog-single__image' ) ); ?>

        <div class="blog-single__content">
            <?php if (have_rows('section')):
                while (have_rows('section')) : the_row();
                    if (get_row_layout() == 'full_text'):
                        get_template_part('templates/blog/single/full-text');
                    elseif (get_row_layout() == 'full_image'):
                        get_template_part('templates/blog/single/full-image');
                
                    elseif (get_row_layout() == 'text-left-image-right'):
                        get_template_part('templates/blog/single/text-left-image-right');
                
                    elseif (get_row_layout() == 'text-right-image-left'):
                        get_template_part('templates/blog/single/text-right-image-left');
                    endif;
                endwhile;
            else :
            endif; ?>
        </div>
    </main>
<?php get_footer(); ?>
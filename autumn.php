<?php
/*
Template Name: Jesień
Template Post Type: page
*/
?>
<?php get_header(); ?>
<main id="swup" class="transition-fade tiles autumn">
    <div class="container-fluid breadcrumbs">
        <div class="breadcrumbs__row row">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {   
                        yoast_breadcrumb( '<p class="" id="breadcrumbs">','</p>' );              
                }
            ?>
        </div>
    </div>
                
    <div class="container-fluid">	
        <div class="tiles__wrapper">
            <h2 class="section-heading"><?php echo the_title(); ?></h2>
            <img class="img-fluid tiles__featured" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/png/jesien.png" width="" height="200" alt="Jesień w Koszalinie" />
        </div>
        <div class="row justify-content-between mt-5">
            <?php if( have_rows('jesien_kafelki', 'option')): $i = 0; ?>
                <?php while( have_rows('jesien_kafelki','option') ): $i++; the_row(); ?>
                        <div class="col-12 col-lg-4 mb-4">
                            <a class="tiles__link" href="#link-<?php echo $i; ?>" style="color: <?php the_sub_field('kolor'); ?>" data-href="#link-<?php echo $i; ?>">    
                                <div class="tiles__box" style="border: solid 3px <?php the_sub_field('kolor'); ?>; ">       
                                    <?php $image = get_sub_field('zdjecie'); ?>  
                                    <?php echo wp_get_attachment_image( $image, 'full' ,false, array('height' =>'200', 'width' =>'200', 'title' => '', 'alt' => '', 'class' => '')); ?>
                                    <h3 class="tiles__title"><?php the_sub_field('tytul'); ?></h3>
                                </div>
                            </a>
                        </div>      
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

   
        <?php if( have_rows('jesien_kafelki', 'option')): $i = 0; ?>
            <?php while( have_rows('jesien_kafelki','option') ): $i++; the_row(); ; ?>              
                <div id="link-<?php echo $i; ?>" class="tiles__desc-<?php echo $i; ?>">
                    <?php the_sub_field('tresc'); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?> 
    </div>
</main>
<?php get_footer(); ?>


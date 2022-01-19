<?php
/*
Template Name: Na skróty
Template Post Type: page
*/
?>

<?php get_header(); ?>
<main id="swup" class="transition-fade shortcuts">
    <div class="container-fluid breadcrumbs">
        <div class="breadcrumbs__row row">
            <?php
                if ( function_exists('yoast_breadcrumb') ) {   
                        yoast_breadcrumb( '<p class="" id="breadcrumbs">','</p>' );              
                }
            ?>
        </div>
    </div>
                
    <div class="container-fluid text-center">	
        <h2><?php echo the_title(); ?></h2>
        <p>Przewodnik specjalnie dla Ciebie</p>
        <div class="row justify-content-between">
            <?php if( have_rows('skroty_kafelki', 'option') ): ?>
                <?php while( have_rows('skroty_kafelki','option') ): the_row(); 
                        $image = get_sub_field('zdjecie'); ?>
                        <div class="col-12 col-lg-4 mb-5 shortcuts__wrapper">
                            <a href="<?php the_sub_field('link'); ?> ">
                                <div class="shortcuts__box" style="background-color:<?php the_sub_field('kolor'); ?>">
                                    <?php echo wp_get_attachment_image( $image, 'full' ,false, array('title' => '', 'alt' => '', 'class' => 'shortcuts__image')); ?>
                                </div> 
                                <h3 class="shortcuts__title"><?php the_sub_field('tytul'); ?></h3>
                            </a>
                        </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>	
    </div>
    <?php get_template_part('templates/homepage/event-cards'); ?>
</main>
<?php get_footer();
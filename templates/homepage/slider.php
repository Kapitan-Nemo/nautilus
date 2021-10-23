<section class="slider">
    <div class="container-fluid">
        <div class="row">
        <div class="col-12 p-relative">
            <h2 class="section-heading">Warte uwagi</h2>
            <img class="slider__scribbble" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/svg/scribbbles/26.svg" alt="" title=""/>
            <div class="slider__category">  
                <?php if( have_rows('slider', 'option') ): ?>
                    <?php while( have_rows('slider','option') ): the_row(); 
                        $image = get_sub_field('zdjecie');
                        ?>
                            <div class="p-relative">  
                            <?php echo wp_get_attachment_image( $image, 'full' ,false, array('title' => '', 'alt' => '', 'class' => 'slider__photo img-fluid')); ?>
                                <a href="<?php the_sub_field('link'); ?> "><h3 class="slider__heading"> <?php the_sub_field('tytul'); ?> <i class="icon icon-long-arrow-right"></i></h3></a>
                            </div> 
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="slider__buttons d-flex justify-content-center">
                <button class="prev"><i class="icon icon-chevron-left"></i></button>
                <button class="next"><i class="icon icon-chevron-right"></i></button>
            </div>
        </div>
          

        </div>
    </div>
</section>
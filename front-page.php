<?php get_header(); ?>
<main id="swup" class="transition-fade front-page">
<div class="container-fluid breadcrumbs">
    <div class="breadcrumbs__row row no-gutters pt-5">
        <?php
            if ( function_exists('yoast_breadcrumb') ) {
           
                    yoast_breadcrumb( '<p class="mb-n5" id="breadcrumbs">','</p>' );
                               
            }
        ?>
    </div>
</div>
    <?php
        get_template_part('templates/homepage/hero');
        get_template_part('templates/homepage/event-cards');
        get_template_part('templates/homepage/slider');
        get_template_part('templates/homepage/blog-cards');
    ?>
</main>
<?php get_footer();
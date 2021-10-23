<?php
get_header(); ?>

<main id="swup" class="transition-fade">
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2> <?php echo the_title(); ?></h2>
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();
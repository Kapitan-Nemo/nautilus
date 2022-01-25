<?php
get_header(); ?>

<main id="swup" class="transition-fade">
    <section>
        <div class="container-fluid">
            <div class="row">
                    <?php
                        global $query_string;
                        $query_args = explode("&", $query_string);
                        $search_query = array();

                        foreach($query_args as $key => $string) {
                        $query_split = explode("=", $string);
                        $search_query[$query_split[0]] = urldecode($query_split[1]);
                        } // foreach

                        $the_query = new WP_Query($search_query);
                        if ( $the_query->have_posts() ) : 
                        ?>
                        <!-- the loop -->

                       
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                            get_template_part('components/content', get_post_format());
                        ?>
                          
               
                        <?php endwhile; ?>
                     
                        <!-- end of the loop -->

                        <?php wp_reset_postdata(); ?>
                <?php else : ?>
                    <div class="search-page">
                        <h2><?php _e( 'Przepraszamy, niczego nie odnaleziono :-(' ); ?></h2>
                        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/png/nie-znaleziono.png" width="400" height="" alt="Nie znaleziono" />
                    </div>               
                <?php endif; ?>
        
            </div>
        </div>
    </section>
</main>

<?php get_footer();



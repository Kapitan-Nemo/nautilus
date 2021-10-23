
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-xl-6 col-12 order-1 order-xl-12">
            <?php the_sub_field( 'text' ); ?>
        </div>
            <?php 
                $image = get_sub_field('image');
                if( !empty($image) ): ?>
                <div class="col-xl-6 col-12 order-12 order-xl-1 d-flex align-items-center">
                    <img class="img-fluid img-radius w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                </div>
            <?php endif; ?>
    </div>
</div>
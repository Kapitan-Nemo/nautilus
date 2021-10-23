<?php 
    $image = get_sub_field('image');
    if( !empty($image) ): ?>
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12">
                <img class="img-fluid img-radius w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
        </div>
    </div>
<?php endif; ?>


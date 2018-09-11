<?php $images = get_field( 'galerie_photos' ); ?>

<?php if ( $images ): ?>

    <section id="galerie-photos" class="main-section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <?php if ( get_field( 'galerie_photos_title' ) ): ?>

                        <h3 class="col-xs-12 text-center">
                            <?php the_field( 'galerie_photos_title'); ?>
                        </h3>

                    <?php endif; ?>

                    <div class="content">

                        <?php foreach ( $images as $image ): ?>

                            <div class="col-xs-6 col-md-3">
                                <img src="<?php echo $image['sizes']['galerie-main-event']; ?>"
                                     class="img-responsive img-rounded" alt="<?php echo $image['alt']; ?>"/>
                            </div>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif;
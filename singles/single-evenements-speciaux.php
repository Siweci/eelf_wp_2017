<div id="special-event-page" >

    <div class="container-fluid">

        <div class="row">
            
            <?php while ( have_posts() ) : the_post(); ?>

                <section id="special-event" class="col-xs-12">

                    <div class="row">

                        <div class="col-md-3 col-md-offset-2">
                            <?php the_post_thumbnail( '', array('class' => 'img-responsive') ); ?>
                        </div>

                        <div class="col-md-5">

                            <h3 class="text-center-xs"><?php the_title(); ?></h3>

                            <?php the_content(); ?>
                            
                            <?php
                            if (get_field( 'tableau' ) ) {
                                echo do_shortcode ( get_field( 'tableau') );
                            }
                            ?>

                        </div>
                    </div>
                    
                </section>
            
            
            
                <?php if (get_field( 'google_map' ) ): ?>

                    <section id="google-map" class="col-xs-12 col-md-8 col-md-offset-2">

                        <?php
                        $options = get_option( 'church_contact_infos' );
                        $google_map_url = $options['google_map_url'];
                        ?>

                         <iframe width="100%" height="400" frameborder="0"
                                 style="border:0"
                                 src="<?php echo $google_map_url; ?>"
                                 allowfullscreen>
                         </iframe>


                    </section>
                    
                <?php endif; ?>
            
            <?php endwhile; ?>

        </div><!-- .row -->

    </div><!-- .container-fluid -->

</div><!-- #special-event-page -->
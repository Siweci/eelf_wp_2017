<?php // global $post; ?>

<section id="tarifs" class="main-section">

    <div class="container-fluid">

        <div class="row">

            <div class="col-xs-12 col-md-8 col-md-offset-2">

                <h3 class="col-xs-12 text-center">Tarifs</h3>

                <?php
                if( have_rows('grille_de_tarif') ):

                        // loop through the rows of data
                    while ( have_rows('grille_de_tarif') ) : the_row();

                        // display a sub field value
                        echo do_shortcode ( get_sub_field('tableau') );

                    endwhile;

                endif;
                ?>

                <div id="meta-tarifs" class="text-justify">

                    <?php the_field( 'meta_tarifs' ); ?>

                </div>

                <div class="inscription col-xs-12 col-md-4 col-md-offset-4">

                    <div class="row">

                        <?php get_template_part( 'parts/form-url' ); ?>

                    </div>

                </div>
                
            </div>

        </div>

    </div>

</section><!-- #tarifs -->
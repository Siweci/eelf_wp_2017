<?php // global $post; ?>


<?php
// check if the flexible content field has rows of data
if( have_rows('grille_de_tarifs') ): ?>

<section id="tarifs" class="main-section">

    <div class="container-fluid">

        <div class="row">

            <div class="col-xs-12 col-md-8 col-md-offset-2">

                <h3 class="col-xs-12 text-center">Tarifs</h3>

                <table class="content table table-hover">
                    

                    <?php
                     // loop through the rows of data
                    while ( have_rows('grille_de_tarifs') ) : the_row(); ?>

                        <?php if( get_row_layout() == 'table_title' ): ?>
                    
                            <thead class="dark">
                            <tr>
                                <td colspan="<?php the_sub_field( 'colspan'); ?>" align="center">
                                    <?php the_sub_field ( 'titre' ); ?>
                                </td>
                            </tr>
                            </thead>
                            
                        <?php elseif( get_row_layout() == 'table_ligne' ): ?>
                            <tr>
                            <?php while( have_rows( 'ligne' ) ): the_row(); ?>
                            <td>
                                <?php the_sub_field( 'cell' ); ?>
                            </td>
                                
                                
                            <?php endwhile; ?>
                            </tr>
                        <?php endif; ?>

                    <?php endwhile; ?>
<!--                    </thead>-->
                </table>


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

<?php else : ?>

    // no layouts found

<?php endif; ?>
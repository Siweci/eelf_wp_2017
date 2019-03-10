<?php

$args = array(
    'category_name' => 'evenements-speciaux',
    'meta_key' => 'date_debut',
    'orderby' => 'meta_value',
    'order' => 'DESC'
//    'posts_per_page' => 1
);

$evenements_speciaux = new WP_Query( $args );

?>

<?php if( $evenements_speciaux->have_posts() ) : ?>
    
    <?php if( $evenements_speciaux->post_count == 1): ?>

        <h2 class="black col-md-8 col-md-offset-2 text-center">Evénement exceptionnel</h2>

        <?php while ( $evenements_speciaux->have_posts() ) : $evenements_speciaux->the_post(); ?>

            <section id="special-event" <?php post_class( 'special-event col-xs-12' ); ?>>

                <div class="row">
                    
                    <?php
                    
                    // applique une mise en forme différente si le post a un tableau
                    
                    $tableau = get_field ( 'tableau' );

                    $end_name = (empty ( $tableau ) ) ? 'single' : 'table';

                    get_template_part ( 'parts/special-event-image', $end_name );
                    
                    ?>

                </div>

            </section>

        <?php endwhile; ?>
    
    <?php else: ?>
        
        <h2 class="black col-md-8 col-md-offset-2 text-center">Evénements exceptionnels</h2>
        
        <div id="special-event-wrapper" class=" col-xs-12 col-md-8 col-md-offset-2">
            
            <div class="row">
    
        <?php while ( $evenements_speciaux->have_posts() ) : $evenements_speciaux->the_post(); ?>

            <section id="<?php echo "special-event-" . get_the_ID(); ?>" <?php post_class( 'special-event col-xs-12 col-md-6' ); ?>>

                <div class="row">
                    
                    <?php
                    
                    get_template_part ( 'parts/special-event-image', 'multi' );
                    
                    ?>

                </div>

            </section>

        <?php endwhile; ?>
                
            </div>
            
        </div>

    <?php endif; ?>

<?php endif;
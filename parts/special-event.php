<?php

$args = array(
    'category_name' => 'evenements-speciaux',
    'posts_per_page' => 1
);

$evenements_speciaux = new WP_Query( $args );

?>

<?php if( $evenements_speciaux->have_posts() ) : ?>
    
    <h2 class="black col-md-8 col-md-offset-2 text-center">Evénement exceptionnel</h2>
    
    <?php while ( $evenements_speciaux->have_posts() ) : $evenements_speciaux->the_post(); ?>
    
    <section id="special-event" <?php post_class( 'col-xs-12' ); ?>>

        <div class="row">

            
            
            <?php
            $end_name = (empty ( get_field ( 'tableau') ) ) ? 'single' : 'table';
            get_template_part ( 'parts/special-event-image', $end_name );
            ?>

        </div>

    </section>

<?php endwhile; endif;
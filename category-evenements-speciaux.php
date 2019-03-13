<?php
/**
 * Affiche la catégorie des événements spéciaux
 */

get_header();


$args = array(
//    'category_name' => 'evenements-speciaux',
    'meta_key' => 'date_debut',
    'orderby' => 'meta_value',
    'order' => 'DESC',
//    'posts_per_page' => 3,
//    'paged' => 1
);

global $events;
$events = new mwc_front_Special_events($args);

?>

<div id="page-evenements-speciaux" class="main">
    
    <div class="container-fluid">
        
        <div class="row">
            
            <h1 class="text-center grey-9 col-xs-12">Evénements exceptionnels</h1>
            
            <section class="col-xs-12 col-md-10 col-md-offset-1">
                
                <?php if( $events->have_posts() ) : while( $events->have_posts() ) : $events->the_post(); ?>
                
                    <div id="<?php echo "special-event-" . get_the_ID(); ?>" <?php post_class( 'special-event col-xs-12 col-md-4'); ?>>

                        <div class="row">

                            <?php

                            get_template_part ( 'parts/special-event-image', 'multi' );

                            ?>

                        </div>

                    </div>
                
                <?php endwhile; endif; ?>
                
            </section>
            
        </div>
        
    </div>
    
</div>

<?php get_footer();
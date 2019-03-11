<?php
/**
 * Affiche la catégorie des événements spéciaux
 */

get_header();

?>

<div id="page-evenements-speciaux" class="main">
    
    <div class="container-fluid">
        
        <div class="row">
            
            <h1 class="text-center grey-9 col-xs-12">Evénements exceptionnels</h1>
            
            <section class="col-xs-12 col-md-10 col-md-offset-1">
                
                <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                
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
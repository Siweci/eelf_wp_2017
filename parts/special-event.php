<?php

$args = array(
    'category_name' => 'evenements-speciaux',
    'meta_key' => 'date_debut',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'paged' => 1
);

global $events;
$events = new mwc_front_Special_events($args);

?>

<?php if( $events->have_posts() ) : ?>

<div id="special-events" class="col-xs-12">
    
    <div class="row">

    <h2 class="black col-md-8 col-md-offset-2 text-center">
        <?php $events->display_title(); ?>
    </h2>

    <div id="special-event-wrapper" <?php $events->wrapper_class(); ?>>

        <div class="row">

            <?php while ( $events->have_posts() ) : $events->the_post(); ?>

            <section id="<?php echo "special-event-" . get_the_ID(); ?>" <?php $events->main_class(); ?>>

                <div class="row">

                    <?php

                    get_template_part ( 'parts/special-event-image', $events->get_end_name() );

                    ?>

                </div>

            </section>

            <?php endwhile; ?>
            
            <?php $events->display_to_archive_button(); ?>

        </div>

    </div>
        
    </div>
    
</div><!-- #special-events -->

<?php endif;
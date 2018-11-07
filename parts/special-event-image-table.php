<?php
/**
 * Called by index.php
 */
?>

<div class="col-md-3 col-md-offset-2">

    <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>

</div>

<div class="col-md-5">

<!--    <h3 class="text-center-xs">Horaires de l'exposition</h3>-->
    
    <?php echo do_shortcode( get_field( 'tableau') ); ?>

    <div class="col-xs-12 text-center-xs">
        <a href="<?php the_permalink(); ?>" id="special-event-more"
           class="more btn btn-lg btn-green">Lire plus</a>
    </div>

</div>
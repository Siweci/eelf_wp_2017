<?php
/**
 * Called by index.php
 * via parts/special-event.php
 */
?>

<div class="single-image col-xs-12 col-md-4 col-md-offset-4">

    <?php the_post_thumbnail('', array('class' => 'img-responsive')); ?>

</div>

<div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
    
    <a href="<?php echo the_permalink(); ?>"
       class="special-event-more more btn btn-lg btn-green">Lire plus</a>
       
</div>
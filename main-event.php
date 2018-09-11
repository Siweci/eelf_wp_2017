<?php /* Template Name: Evénement principal */  ?>

<?php get_header(); ?>

<?php $page_slug = get_post_field ( 'post_name', get_post() ); ?>

<?php
/* Traitement des dates */
$dates = get_field('dates' );


$date_start = get_field( 'dates_start', false, false);

$date_st = new DateTime($date_start);

$date_start_year = $date_st->format('Y');
$date_start_month = $date_st->format('m');
$date_start_day = $date_st->format('d');



$date_end = get_field( 'dates_end', false, false);


$date_ed = new DateTime($date_end);

$date_end_year = $date_ed->format('Y');
$date_end_month = $date_ed->format('m');
$date_end_day = $date_ed->format('d');

if ($date_ed == $date_st) {
    
    $date_range = "le " . $dates['start'];
    
} else if ($date_end_year == $date_start_year && $date_end_month == $date_start_month) {
    
    $date_range = "du " . $date_start_day . " au " . $dates['end'];
    
} else {
    
    $date_range = "du " . $dates['start'] . " au " . $dates['end'];
    
}


?>


<div id="<?php echo $page_slug; ?>">
    
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
                        
    <?php $content = get_extended( $post->post_content ); ?>
    
    <section id="basic-infos" class="main-section" role="article">
    
        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <div class="row">
                        
                        <aside id="register-form" class="col-xs-12 col-md-5 text-left">
                            
                            <h1><?php the_title(); ?></h1>
                            
                            <p id="theme"><?php the_field( 'theme' ); ?></p>
                            
                            <div class="date">
                                <?php echo $date_range; ?>
                            </div>
                            
                            <div class="inscription col-xs-12">

                                <div class="row">

                                    <?php get_template_part( 'parts/form-url' ); ?>

                                </div>

                            </div>
                            
                        </aside>
                        
                        <main class="col-xs-12 col-md-6 col-md-offset-1">

<!--                            <h1>Week-end d'Eglise</h1>-->

                            <article id="description">

                                <?php
                                // display excerpt
                                echo apply_filters( 'the_content', $content['main']) ;
                                ?>

                            </article>
                            

                            <?php
                            // l'organisateur principal est le premier de la liste des organisateurs
                            $organisateur_principal = get_field('organisateurs');
                            $organisateur_principal = $organisateur_principal[0];
                            
                            $benevole = $organisateur_principal['nom'];
                            $role = $organisateur_principal['role'];
                            
                            $benevole_firstname = get_field ( 'firstname', $benevole );
                            
                            $benevole_photo_url = get_field( 'photo_url', $benevole);
                            $benevole_photo_id = mwc_get_google_photo_id($benevole_photo_url);
                            ?>
                            
                            <div id="organisateur" class="media">

                                <div class="media-left">
                                    
                                    <div class="media-object img-circle text-center">
                                        
                                        <?php if ( has_post_thumbnail($benevole) ): ?>
                                            
                                            <?php
                                            $attrs = array('class' => 'img-responsive img-circle');
                                            echo get_the_post_thumbnail( $benevole, 'benevole-miniature', $attrs );
                                            ?>
                                        
                                        <?php else: ?>
                                        
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        
                                        <?php endif; ?>
                                        
                                    </div>

                                </div>
                                
                                <div class="media-body">
                                    
                                    <h4 class="media-heading">
                                        <?php echo $benevole_firstname; ?>
                                    </h4>
                                    
                                    <p class="role">
                                        <?php echo $role; ?>
                                    </p>
                                    
                                </div>

                            </div><!-- #organisateur -->

                        </main>

                    </div>

                </div>

            </div>

        </div>
        
    </section><!-- #basic-infos -->
    
    
    <section id="savoir-plus">
        
        <div class="container-fluid">
            
            <div class="row">
                
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    
                    <div class="row">
                    
                        <div class="panel-group">

                            <div class="panel panel-no-border">

                                <div class="panel-heading">

                                    <h4 class="panel-title text-center">
                                        <a role="button" data-toggle="collapse" href="#infos-complementaires" aria-expanded="true" aria-controls="infos-complementaires">
                                            <span class="texte">
                                                En savoir plus
                                            </span>
                                            <span class="icone">
                                                <i class="fa fa-caret-down fa-2x" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </h4>

                                </div><!-- .panel-heading -->

                                <div id="infos-complementaires" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">

                                    <div class="panel-body">
                                        
                                        <?php
                                        // Displays extended
                                        echo apply_filters( 'the_content', $content['extended']) ;
                                        ?>
                                        
                                    </div>

                                </div>

                            </div>

                        </div><!-- .paneil-group -->
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </section><!-- #savoir-plus -->
    
    
    <?php get_template_part( 'parts/main-event-tarifs' ); ?>
    
    

    <?php get_template_part( 'parts/main-event-galerie-photos' ); ?>
                        
    
    
    <?php get_template_part( 'parts/main-event-personnes-contact' ); ?>
    
    
    <?php get_template_part( 'parts/main-event-map' ); ?>
    
    
<?php endwhile; endif; ?>
    
</div>


<?php get_footer();
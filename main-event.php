<?php /* Template Name: Evénement principal */  ?>

<?php get_header(); ?>

<?php $page_slug = get_post_field ( 'post_name', get_post() ); ?>


<div id="<?php echo $page_slug; ?>">
    
<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
                        
    <?php $content = get_extended( $post->post_content ); ?>
    
    <section id="basic-infos" class="main-section" role="article">
    
        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <div class="row">
                        
                        <aside id="register-form" class="col-xs-12 col-md-5 text-center">
                            
                            <h1><?php the_title(); ?></h1>
                            
                            <div class="date">Du 28 au 30 septembre 2018</div>
                            
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
                            // l'organisateur princiaple est le premier de la liste des organisateurs
                            $organisateur_principal = get_field('organisateurs')[0];
                            
                            $benevole = $organisateur_principal['nom'];
                            $role = $organisateur_principal['role'];
                            
                            $benevole_firstname = get_field ( 'firstname', $benevole );
                            ?>
                            
                            <div id="organisateur" class="media">

                                <div class="media-left">
                                    <div class="media-object img-circle text-center">
                                        <!--<img class="" src="..." alt="...">-->
                                        <i class="fa fa-user" aria-hidden="true"></i>
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
        
    </section>
    
    <?php get_template_part( 'parts/main-event-tarifs' ); ?>
    
    

    <?php get_template_part( 'parts/main-event-galerie-photos' ); ?>
                        
    
    
    <?php get_template_part( 'parts/main-event-personnes-contact' ); ?>
    
    
    <?php get_template_part( 'parts/main-event-map' ); ?>
    
    
<?php endwhile; endif; ?>
    
</div>


<?php get_footer();
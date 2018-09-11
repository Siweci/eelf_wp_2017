<?php get_header(); ?>

<div id="<?php echo $post->post_name; ?>">    
    
    <?php get_template_part( "parts/header-image-half" ); ?>

    <div class="container">

        <div class="row">

            <section id="messages" class="col-xs-12 col-md-10 col-md-offset-1">

                <div class="row">

                    <h2 class="col-xs-12 text-center">Les derniers messages</h2>
                    
                    <article class="col-xs-12">
                        
                        <div class="row">
                            
                            <a href="#" class="icone col-xs-12 col-md-3">
                                <div class="icone-table center-block-xs">
                                    <div class="icone-cell">
                                        <i class="fa fa-microphone fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </a>
                            
                            <div class="text col-xs-12 col-md-9">
                                <h4 class="">Le tabernacle</h4>
                                <p class="description-message">
                                    Quelles leçons de la construction du Tabernacle pouvont nous appliquer à notre vie pour que nous soyons heureux.
                                </p>
                                <p class="predicateur">Pasteur Philippe Evan</p>
                                <p class="tags">
                                    <span>#SerieExode</span>
                                    <span>#Edification</span>
                                </p>
                            </div>
                            
                        </div>
                        
                    </article>
                    
                    <article class="col-xs-12">
                        
                        <div class="row">
                            
                            <div class="icone col-xs-12 col-md-3">
                                <div class="icone-table center-block-xs">
                                    <div class="icone-cell">
                                        <i class="fa fa-microphone fa-5x" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text col-xs-12 col-md-9">
                                <h4 class="">Stratégie d'évangélisation et conduite du Saint Esprit</h4>
                                <p class="description-message">
                                    
                                </p>
                                <p class="texte-biblique">Actes 13.13-52</p>
                                <p class="predicateur">Pasteur Philippe Evan</p>
                                <p class="tags">
                                    <span>#Stratégie</span>
                                    <span>#Evangélisation</span>
                                    <span>#Destiné</span>
                                    <span>#ResponsablitéPersonnelle</span>
                                    <span>#Evangile</span>
                                </p>
                            </div>
                            
                        </div>
                        
                    </article>

                </div>

            </section>
            
            <div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
                <button id="get-archives" class="get-archives btn btn-outline btn-lg btn-no-radius">Nos archives</button>
            </div>

        </div>

    </div>    
    
    
</div>



<?php get_footer();
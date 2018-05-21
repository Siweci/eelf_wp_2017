<?php get_header(); ?>

<header id="only-text-header" class="header">
            
    <div class="text-vertical-center">

        <h1><?php the_title(); ?></h1>
        
    </div>

</header>

<div class="container">

    <div class="row">

        <div id="send-message" class="col-md-6 col-md-offset-1">

            <div class="">

                <h2 class="col-xs-12">Nous envoyer un message</h2>

                <form class="col-xs-12">
                    
                    <input type="hidden" id="email"  name="email">

                    <div class="row">
                        
                        <div class="fields-wrapper col-xs-12">
                            
                            <div class="row">

                                <div class="col-xs-12 col-md-6">

                                    <div class="form-group">
                                        <label for="name">Votre nom</label>
                                        <input type="text" class="form-control only-bottom" id="name" name="name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="telephone">Votre numéro de téléphone</label>
                                        <input type="tel" class="form-control only-bottom" id="telephone" name="telephone" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="imerle">Votre email</label>
                                        <input type="email" class="form-control only-bottom" id="imerle"  name="imerle" required>
                                    </div>

                                </div>

                                <div class="col-xs-12 col-md-6">

                                    <div class="form-group">
                                        <label for="message">Votre message</label>
                                        <textarea class="form-control only-bottom" id="message" name="message" rows="6" required></textarea>
                                    </div>

                                </div>

                                <div id="send-button-wrapper" class="col-xs-12 col-md-6">

                                    <button id="send-message-button" class="btn btn-link pull-right">                                        
                                        <img src="<?php echo get_template_directory_uri() . '/img/button_send.svg'; ?>" />
                                    </button>

                                </div>
                                
                            </div>
                            
                        </div><!-- .fields-wrapper -->
                        
                        <div class="col-xs-12">
                            <div id="message-center"></div>
                        </div>
                        
                    </div>

                </form>

            </div>

        </div><!-- #send-message -->
        
        
        <div class="col-xs-12 col-md-4">

            <div class="row">

                <div id="contact-infos" class="col-xs-12 col-md-11 col-md-offset-1 bg-grey-primary">

                    <h2>Nos coordonnées</h2>

                    <article id="contact-infos-adresse">
                        <div class="media-left media-middle">
                            <i class="fa fa-map-marker fa-2x fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <?php printf(
                                    '<p>%1$s</p><p>%2$s %3$s</p>',
                                    mwc_front_Contacts::get_adresse( 'rue' ),
                                    mwc_front_Contacts::get_adresse( 'cp' ),
                                    mwc_front_Contacts::get_adresse( 'ville' )
                            );?>
                        </div>
                    </article>

                    <article id="contact-infos-telephone">
                        <div class="media-left media-middle">
                            <i class="fa fa-phone fa-2x fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <?php mwc_front_Contacts::print_telephone_link(); ?>
                        </div>
                    </article>

                    <article id="contact-infos-mail">
                        <div class="media-left media-middle">
                            <i class="fa fa-envelope-o fa-2x fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <?php mwc_front_Contacts::print_email_link(); ?>
                        </div>
                    </article>

                </div><!-- #contact-infos -->

            </div>

        </div>


        <section id="plan-visit" class="col-xs-12 col-md-10 col-md-offset-1">

            <div class="row">

                <div id="map" class="col-xs-12 col-md-6">
                    <div class="row">

<!--                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2730.7461931211587!2d7.171847415246861!3d46.80930527913987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e69167550ec29%3A0x7cfd5e5b04aaa9be!2sRoute+Mon-Repos+3%2C+1700+Fribourg%2C+Suisse!5e0!3m2!1sfr!2sfr!4v1507731204054"
                        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->

                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5461.35372985108!2d7.176181767211915!3d46.81067080361657!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e69167550ec29%3A0x7cfd5e5b04aaa9be!2sRoute+Mon-Repos+3%2C+1700+Fribourg%2C+Suisse!5e0!3m2!1sfr!2sfr!4v1511954494024"
                            width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>

                <div id="plan" class="col-xs-12 col-md-6 col-md-offset-">

                    <h2 class="col-xs-12">Planifier votre visite</h2>
                    
                    <div class="col-xs-12 content">
                        <?php
                        $page = new mwc_front_Page( 'planifer-votre-visite' );
                        $page->print_content_filter();
                        ?>
                    </div>

                </div>

            </div>

        </section><!-- #plan-visit -->

        <section id="horaires-wrapper" class="col-xs-12 col-md-10 col-md-offset-1">

            <div class="row">

                <div id="horaires" class="col-xs-12 col-md-6 col-md-offset-3">

            <div class="row">

                <div class="main-content col-xs-12">

                    <div class="row">

                        <article class="col-xs-12 col-md-6">
                            <h3>Horaires</h3>
                            <div class="content">
                                <p>Culte dimanche à <?php echo mwc_front_Contacts::get_times( 'dimanche', 'start' ); ?></p>
                            </div>
                        </article>

                        <article class="col-xs-12 col-md-6">
                            <h3>Notre adresse</h3>
                            <address class="content">
                                <?php mwc_front_Contacts::print_bloc_adresse(); ?>
                            </address>
                        </article>

                    </div>

                </div>

            </div>

                </div>

            </div>

        </section><!-- #horaires -->

    </div><!-- .row -->

</div><!-- .container-fluid -->

<?php get_footer();
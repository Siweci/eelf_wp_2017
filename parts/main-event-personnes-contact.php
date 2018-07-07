<?php $benevoles = get_field( 'organisateurs' ); ?>

<?php if( have_rows('organisateurs') ): ?>

    <?php
    $count_organisateurs = count(get_field('organisateurs'));
    $class_flex = ($count_organisateurs <=3 ) ? 'flex' : '';
    ?>

    <section id="personnes-contact" class="main-section">

        <div class="container-fluid">

            <div class="row">

                <div class="col-xs-12 col-md-10 col-md-offset-1">

                    <h3 class="col-xs-12 text-center">Personnes à contacter</h3>

                    <div class="col-xs-12">

                        <div class="row">

                            <div class="<?php echo "content $class_flex"; ?>"><!-- .flex -->

                                
                                <?php
                                
                                /* Set constants */
                                
                                $attrs = array('class' => 'img-responsive img-circle');
                                    
                                $google_base_url = 'https://drive.google.com/uc?id=';


                                /* loop through the rows of data of repeater */
                                
                                while ( have_rows('organisateurs') ) : the_row();
                                    
                                    
                                    // data accessible directly
                                
                                    $benevole = get_sub_field( 'nom' );
                                    
                                    //face name = nom <=> ACF object bénévole
                                    $role = get_sub_field( 'role' );
                                    
                                    $competence = get_sub_field( 'competence' );
                                    
                                    
                                    // data accessible through ACF Object bénévole
                                    
                                    $benevole_firstname = get_field( 'firstname', $benevole );

                                    $contact_by = get_field( 'contact_by', $benevole );
                                   
                                    $benevole_photo_url = get_field( 'photo_url', $benevole);
                                    
                                    $benevole_photo_id = mwc_get_google_photo_id($benevole_photo_url);
                                    
                                    
                                ?>

                                <div class="col-xs-12 col-sm-4 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">
                                            
                                            <?php if ( has_post_thumbnail($benevole) ): ?>
                                            
                                                <?php echo get_the_post_thumbnail( $benevole, 'benevole-miniature', $attrs ); ?>
                                                
                                            <?php elseif ( !empty($benevole_photo_id) ): ?>
                                            
                                                <img src="<?php echo $google_base_url . $benevole_photo_id; ?>"
                                                     class="img-responsive img-circle" alt="...">
                                                
                                            <?php else:?>
                                                
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                
                                            <?php endif; ?>

                                        </div>

                                        <div class="caption">

                                            <h4><?php echo $benevole_firstname; ?></h4>
                                            <?php // echo $benevole->post_title; ?>
                                            
                                            <p class="role">
                                                <?php echo $role; ?>
                                            </p>

                                            <p class="meta-role">
                                                <?php echo $competence; ?>
                                            </p>
                                            
                                            <?php if ( is_user_logged_in() ): ?>

                                                <p class="network">

                                                    <?php if ( get_field( 'email', $benevole) && in_array('email', $contact_by) ): ?>
                                                        <a href="mailto:<?php echo get_field( 'email', $benevole); ?>"
                                                           class="btn btn-link" role="button">
                                                            <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                        </a>
                                                    <?php endif; ?>

                                                    <?php if ( get_field( 'mobile', $benevole) && in_array('mobile', $contact_by) ): ?>
                                                        <a href="tel:<?php echo get_field( 'mobile', $benevole); ?>"
                                                           class="btn btn-link" role="button">
                                                            <i class="fa fa-mobile fa-fw fa-2x" aria-hidden="true"></i>
                                                        </a>

                                                        <?php if ( in_array('whatsapp', $contact_by) ): ?>
                                                            <a href="https://wa.me/41791951295"
                                                               class="btn btn-link" role="button">
                                                                <i class="fa fa-whatsapp fa-fw fa-2x" aria-hidden="true"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                    <?php endif; ?>

                                                    <?php if ( get_field( 'facebook', $benevole) && in_array('facebook', $contact_by) ): ?>
                                                            <a href="<?php echo get_field( 'facebook', $benevole); ?>"
                                                               class="btn btn-link" role="button">
                                                                <i class="fa fa-facebook-official fa-fw fa-2x" aria-hidden="true"></i>
                                                            </a>
                                                    <?php endif; ?>

                                                </p>
                                                
                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                                <?php endwhile; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

<?php endif;
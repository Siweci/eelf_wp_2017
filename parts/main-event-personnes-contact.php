<?php $organisateurs = get_field( 'organisateurs' ); ?>

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
                                // loop through the rows of data
                                while ( have_rows('organisateurs') ) : the_row();

                                    $nom = get_sub_field( 'nom' );
                                    $organisateur = $nom[0];

                                    $role = get_sub_field( 'role' );

                                    $competence = get_sub_field( 'competence' );

                                    $contact_by = get_field( 'contact_by', $organisateur );
                                ?>

                                <div class="col-xs-12 col-md-3">

                                    <div class="thumbnail text-center">

                                        <div class="background-icone img-circle text-center center-block">

                                            <!--<img src="..." alt="...">-->
                                            <i class="fa fa-user" aria-hidden="true"></i>

                                        </div>

                                        <div class="caption">

                                            <h4><?php echo $organisateur->post_title; ?></h4>

                                            <p class="role">
                                                <?php echo $role; ?>
                                            </p>

                                            <p class="meta-role">
                                                <?php echo $competence; ?>
                                            </p>

                                            <p class="network">

                                                <?php if ( get_field( 'email', $organisateur) && in_array('email', $contact_by) ): ?>
                                                    <a href="mailto:<?php echo get_field( 'email', $organisateur); ?>"
                                                       class="btn btn-link" role="button">
                                                        <i class="fa fa-envelope-o fa-fw fa-2x" aria-hidden="true"></i>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if ( get_field( 'mobile', $organisateur) && in_array('mobile', $contact_by) ): ?>
                                                    <a href="tel:<?php echo get_field( 'mobile', $organisateur); ?>"
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

                                                <?php if ( get_field( 'facebook', $organisateur) && in_array('facebook', $contact_by) ): ?>
                                                        <a href="<?php echo get_field( 'facebook', $organisateur); ?>"
                                                           class="btn btn-link" role="button">
                                                            <i class="fa fa-facebook-official fa-fw fa-2x" aria-hidden="true"></i>
                                                        </a>
                                                <?php endif; ?>

                                            </p>

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
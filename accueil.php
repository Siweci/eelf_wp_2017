<?php get_header(); ?>

<header id="main-header" class="header">

    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slider_1.jpg">

    <div id="slogan">

        <div class="table">

            <div class="text-vertical-center">

                <p>Pour connaître et</p>
                <p>faire connaître Jésus-Christ</p>

            </div>

        </div><!-- .table -->

    </div><!-- #slogan -->

</header>

<div class="container-fluid">

    <div class="row">


        <!-- NEXT EVENT -->

            <div id="next-event" class="col-xs-12">

                <div class="row">

                    <div id="next-event-illustration" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-2">

                        <div class="row">

                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/church@2x.jpg" class="img-responsive" >

                            <div class="media">

                                <div class="media-left">
                                    <span id="next-event-day"><?php echo $next_sunday['day_number']; ?></span>
                                </div>

                                <div class="media-body">
                                    <span id="next-envent-month" class="media-heading">
                                        <?php echo $next_sunday['month']; ?>
                                    </span>
                                  <span id="next-event-hour">10:00</span>
                                </div>

                            </div><!-- .media -->

                        </div>

                    </div><!-- #next-event-illustration -->

                    <div class="col-xs-12 col-md-5 text-center">
                        <h1>Prochain événement</h1>
                        <h2>Culte du dimanche</h2>
                        <?php // include 'parts/btn-lire-plus.php'; ?>
                    </div>

                </div><!-- .row -->

            </div><!-- #next-event -->



        <!-- SPECIAL EVENT -->

        <?php // include 'parts/special-event.php'; ?>



        <!-- SERVICES -->

        <section id="services" class="col-xs-12">

            <div class="row">

                <article id="find-us" class="col-xs-12 col-md-4">

                    <a href="find-us.php" class="thumbnail no-padding no-border">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/map_on_mobile_screen.jpg" alt=""/>
                        <div class="caption">
                            <h3>
                                Nous trouver
                                <span class="pull-right">
                                    <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i>
                                </span>
                            </h3>
                        </div>
                    </a>

                </article>

                <article id="messages" class="col-xs-12 col-md-4">

                    <a href="#" class="thumbnail no-padding no-border">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/woman_headphones.jpg" alt=""/>
                        <div class="caption">
                            <h3>
                                Messages
                                <span class="pull-right">
                                    <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i>
                                </span>
                            </h3>
                        </div>
                    </a>

                </article>

                <article id="infos" class="col-xs-12 col-md-4">

                    <a href="activites.php" class="thumbnail no-padding no-border">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/meeting.jpg" alt=""/>
                        <div class="caption">
                            <h3>
                                Nos activités
                                <span class="pull-right">
                                    <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i>
                                </span>
                            </h3>
                        </div>
                    </a>

                </article>

            </div>

        </section>


        <!-- TEMOIGNAGES -->

        <?php // include 'includes/temoignages-home.php'; ?>


        <!-- NEWSLETTER -->

        <?php // include 'includes/newsletter-home.php'; ?>

    </div><!-- .row -->

</div><!-- .container-fluid -->



<?php
// get_sidebar();
get_footer();
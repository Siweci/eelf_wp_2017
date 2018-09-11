<?php get_header(); ?>

<?php get_template_part( 'parts/header-image-large'); ?>

<div class="container-fluid">

    <div class="row">


        <!-- NEXT EVENT -->
        
            <?php $next_sunday = mwc_get_next_sunday(); ?>
            
            <?php
            $args = array(
                'category_name' => 'evenement',
                'posts_per_page' => 1
            );

            $next_event = new WP_Query( $args );
            ?>

            <?php if ( $next_event->have_posts() ) : while ( $next_event->have_posts() ) : $next_event->the_post(); ?>

                <div id="next-event" class="col-xs-12">

                    <div class="row">

                        <div id="next-event-illustration" class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-2">

                            <div class="row">

                                <?php the_post_thumbnail( '', array('class' => 'img-responsive' ) ); ?>

                                <div class="media">

                                    <div class="media-left">
                                        <span id="next-event-day"><?php echo $next_sunday['day_number']; ?></span>
                                    </div>

                                    <div class="media-body">

                                        <span id="next-envent-month" class="media-heading">
                                            <?php echo $next_sunday['month']; ?>
                                        </span>

                                        <span id="next-event-hour">
                                            <?php echo mwc_front_Contacts::get_times('dimanche', 'debut'); ?>
                                        </span>

                                    </div>

                                </div><!-- .media -->

                            </div>

                        </div><!-- #next-event-illustration -->

                        <div class="col-xs-12 col-md-5 text-center">
                            
                            <h1>Prochain événement</h1>
                            <h2><?php the_title(); ?></h2>
                            
                            <?php if ( !mwc_is_empty_content() ) : ?>
                            
                                <a href="<?php the_permalink(); ?>" id="next-event-more"
                                   class="more btn btn-lg btn-green">
                                    Lire plus
                                </a>
                            
                            <?php endif; ?>
                            
                        </div>

                    </div><!-- .row -->

                </div><!-- #next-event -->

            <?php endwhile; endif; ?>
            
            <?php wp_reset_query(); ?>

        <!-- SPECIAL EVENT -->

        <?php // include 'parts/special-event.php'; ?>



        <!-- SERVICES -->

        <?php
        $args = array(
            'post_type' => 'page',
            'post_name__in' => array('nos-messages', 'nous-trouver', 'nos-activites'),
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        
        $services = new WP_Query( $args );
        ?>
        
        <section id="services" class="col-xs-12">

            <div class="row">
                
                <?php if ( $services->have_posts() ) : while ( $services->have_posts() ) : $services->the_post(); ?>
                    
                    <article id="<?php echo $post->post_name; ?>" class="col-xs-12 col-md-4">

                        <a href="<?php the_permalink(); ?>" class="thumbnail no-padding no-border">
                            
                            <?php the_post_thumbnail(); ?>
                            
                            <div class="caption">
                                <h3>
                                    <?php the_title(); ?>
                                    <span class="pull-right">
                                        <i class="fa fa-long-arrow-right fa-lg" aria-hidden="true"></i>
                                    </span>
                                </h3>
                            </div>
                            
                        </a>

                    </article>
                
                <?php endwhile; endif; ?>

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
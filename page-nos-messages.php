<?php get_header(); ?>

<?php
$args = array(
    'post_type' => 'predication',
    'meta_key'	=> 'date',
    'orderby'	=> 'meta_value_num',
    'order'	=> 'DESC'
    
);
$predications = new WP_Query( $args );
?>


<div id="<?php echo $post->post_name; ?>">    
    
    <?php get_template_part( "parts/header-image-half" ); ?>

    <div class="container">

        <div class="row">

            <section id="messages" class="col-xs-12 col-md-10 col-md-offset-1">

                <div class="row">

                    <h2 class="col-xs-12 text-center">Les derniers messages</h2>
                    
                    <?php if ( $predications->have_posts() ): while ( $predications->have_posts() ): $predications->the_post(); ?>
                        
                        <?php $predication = new mwc_front_Predication( get_the_ID() ); ?>
                        
                    
                        <article class="col-xs-12">

                            <div class="row">
                                
                                <?php $predication->print_main_icone_wrapper_open(); ?>
                                
                                    <div class="icone-table center-block-xs">
                                        <div class="icone-cell">
                                            <i class="fa fa-microphone fa-5x" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                
                                <?php $predication->print_main_icone_wrapper_close();?>

                                <div class="text col-xs-12 col-md-9">
                                    <h4 class=""><?php the_title(); ?></h4>
                                    <p class="description-message">
                                        <?php the_content(); ?>
                                    </p>
                                    <p class="predicateur">
                                        <?php the_field( 'nom_predicateur' ); ?>
                                    </p>

                                    <?php
                                    $tags = $predication->get_tags();
                                    ?>
                                    <p class="tags">
                                        <?php
                                        foreach ($tags as $tag) {
                                            printf('<span>%1$s</span>', $tag);
                                        }
                                        ?>
                                    </p>
                                </div>

                            </div>

                        </article>
                    
                    <?php endwhile; endif; ?>

                </div>

            </section>
            
            <?php if( $predications->post_count > 1): ?>
            
<!--                <div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
                    <button id="get-archives" class="get-archives btn btn-outline btn-lg btn-no-radius">Nos archives</button>
                </div>-->
            
            <?php endif; ?>

        </div>

    </div>    
    
    
</div>



<?php get_footer();
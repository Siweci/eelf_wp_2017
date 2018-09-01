<?php get_header();?>

<?php $page_slug = $post->post_name; ?>

<?php get_template_part( 'parts/header-no-text' ); ?>

<?php
$args = array(
    'post_type' => 'activites',
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$activites = new WP_Query( $args );
?>

<div class="container">

    <div class="row">
        
        <section id="<?php echo $page_slug; ?>" class="col-xs-12">

            <div class="row">

                <?php if( $activites->have_posts() ) : while ( $activites->have_posts() ) : $activites->the_post(); ?>
                    
                    <?php
                    if( !is_empty_content() ) {
                        
                        $permalink = get_permalink();
                        $link_start = sprintf('<a href="%1$s" class="to-activity">', $permalink);
                        $link_end = '</a>';
                        
                    } else {
                        
                        $link_start = '';
                        $link_end = '';
                    }
                    ?>
                    
                    <article id="<?php echo $post->post_name; ?>" class="col-xs-12 col-md-4 text-center">
                        
                        <?php echo $link_start; ?>

                        <div class="panel panel-default panel-no-bg panel-no-border-in">

                            <div class="panel-heading text-center">

                                <?php the_post_thumbnail(
                                            'galerie-activites',
                                            array('class' => 'img-responsive') );
                                ?>
                                <h3 class="panel-title"><?php the_title(); ?></h3>

                            </div>

                            <div class="panel-body">
                               <?php the_excerpt(); ?>
                            </div>

                            <div class="panel-footer">
                                
                                <?php
                                
                                /*
                                 * Pour les metas
                                 * mmprime en priorité le lien ou le texte
                                 */
                                
                                $link = get_field( 'link_activite' );
                                
                                if ( empty( $link ) ) {
                                    
                                    the_field( 'meta_activite' );
                                    
                                } else {
                                    
                                    printf('<a href="%1$s" target="%2$s">%3$s</a>',
                                            $link['url'],
                                            $link['target'],
                                            $link['title']
                                    );
                                    
                                }
                                ?>
                                
                            </div>

                        </div>
                            
                        <?php echo $link_end; ?>

                    </article>

                <?php endwhile; endif; ?>
                
            </div>
            
        </section>

    </div><!-- .row -->

</div><!-- .container-fluid -->



<?php get_footer();
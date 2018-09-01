<?php get_header(); ?>

<?php get_template_part( 'parts/header-no-text' ); ?>

<main>

    <div class="container">

        <div class="row">

            <div id="<?php echo $post->post_name; ?>" class="content col-xs-12">

                <!--<div class="row">-->
                    
                    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

                        <?php the_content(); ?>

                    <?php endwhile; endif; ?>
                    
                <!--</div>-->

            </div>

        </div>

    </div>
    
</main>



<?php get_footer();
<?php get_header(); ?>

<?php $page_slug = $post->post_name; ?>

<?php get_template_part( 'parts/header-no-text' ); ?>

<main>

<div class="container">

        <div class="row">

            <div id="<?php echo $page_slug; ?>" class="content col-xs-12">

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
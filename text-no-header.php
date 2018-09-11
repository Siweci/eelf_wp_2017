<?php /* Template Name: text-no-header */  ?>

<?php get_header(); ?>

<header id="only-text-header" class="header">
            
    <div class="text-vertical-center">

        <h1><?php the_title(); ?></h1> 

    </div>

</header>


<div class="container">
    
    <div class="row">
        
        <div id="<?php echo $post->post_name; ?>" class="page-content col-xs-12 col-md-10 col-md-offset-1">
            
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
                <?php the_content(); ?>
            
            <?php endwhile; endif; ?>
            
        </div>
        
    </div>
    
</div><!-- .container -->


<?php get_footer();
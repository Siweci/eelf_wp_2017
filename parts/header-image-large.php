<?php
$args = array(
    'category_name' => '_header',
    'posts_per_page' => 1
);

$header = new WP_Query( $args );
?>

<?php if ( $header->have_posts() ) : while ( $header->have_posts() ) : $header->the_post(); ?>

    <header id="main-header" class="header">

        <?php the_post_thumbnail(); ?>

        <div id="slogan">

            <div class="table">

                <div class="text-vertical-center">

                    <?php the_content(); ?>

                </div>

            </div><!-- .table -->

        </div><!-- #slogan -->

    </header>

<?php endwhile; endif; ?>

<?php wp_reset_query();
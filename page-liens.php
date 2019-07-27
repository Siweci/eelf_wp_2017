<?php get_header(); ?>

<?php $link_categories = MWC_Links_Utils::get_categories(); ?>

<header id="only-text-header" class="header">
            
    <div class="text-vertical-center">

        <h1><?php the_title(); ?></h1> 

    </div>

</header>


<div class="container">
    
    <div class="row">
        
        <div id="<?php echo $post->post_name; ?>" class="page-content col-xs-12 col-md-10 col-md-offset-1">

            <section id="mwc-liens">

                <?php foreach ($link_categories as $link_category) : ?>

                    <h2 class="col-xs-12"><?php echo $link_category['name']; ?></h2>

                    <?php
                    $links = new MWC_Links_Link( array(
                        'category' => $link_category,
                        'class' => array('col-xs-12')
                        // 'img_size' => 'mwc_medium_large'
                    ) );

                    $liens = $links->get_links();
                    ?>

                    <div class="mwc-liens-wrapper">

                        <?php foreach ($liens as $lien): ?>
                        
                            <?php echo $lien['html_opening']; ?>
                        
                                <div class="row">

                                    <div class="icone-table center-block-xs icone col-xs-12 col-md-3">

                                        <div class="icone-cell">
                                            
                                            <?php echo $lien['img_tag']; ?>
                                            
                                            <!--<img src="<?php echo get_template_directory_uri() . '/img/broken-link.svg'; ?>" />-->

                                        </div>

                                    </div>

                                    <div class="text col-xs-12 col-md-9">
                                        
                                        <h3>
                                            <?php echo $lien['link_text']; ?>
                                        </h3>
                                        <?php echo $lien['link_comment']; ?>

                                    </div>
                                    
                                </div>

                            <?php echo $lien['html_closing']; ?>

                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>

            </section>
            
        </div>
        
    </div>
    
</div><!-- .container -->


<?php get_footer();
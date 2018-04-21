

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php
        if (!is_category() ) {
            wp_title( '&raquo', true, 'right' );
        } else {
            echo single_cat_title() . ' | ' . get_bloginfo( 'name' ) ;
        }
        ?>
    </title>


    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
            
</head>

<body <?php body_class();?>>
    
    <nav class="navbar navbar-default navbar-fixed-top">
        
        <div class="container-fluid">
            
            
            <div class="navbar-header">
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                
            <a class="navbar-brand bleu" href="<?php echo home_url( '/' ); ?>">
                Relation-aide.com (Ressources)
            </a>
                
            </div><!-- .navbar-header -->
        
        
            <div class="collapse navbar-collapse" id="main-navbar">

                <?php
                /* Primary navigation */
                wp_nav_menu( array(
                    'menu' => 'header-menu',
                    'depth' => 2,
                    'container' => false,
                    'menu_class' => 'nav navbar-nav navbar-right',
                    'walker' => new wp_bootstrap_navwalker()
                ) );
                ?>

            </div>
            
        </div>
        
    </nav>
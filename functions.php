<?php

require_once( ABSPATH . 'wp-admin/includes/file.php' );
$home_path = get_home_path();

require 'functions/functions-ajax.php';

require 'functions/functions-classes.php';


/*
 * Autoload pour les classes
 */

spl_autoload_register( 'mwc_namespace_autoload' );

function mwc_namespace_autoload( $class_name ) {
    
    $scheme = 'mwc_front_';
    
    if ( strpos($class_name, $scheme) !== 0 ) {
        return;
    }
    
    $filename = str_replace($scheme, '', $class_name);
    
    $filepath =  trailingslashit( dirname(__FILE__) ) . 'classes/' . $filename . '.php';
    
    include_once ( $filepath );
    
}


function mwc_dump($datas) {
    
    $datas_type = gettype($datas);
    echo "<pre>";
        echo $datas_type . "<br/>";
        
        if ($datas_type == 'boolean') {
            print ($datas) ? "true" : "false";
        } else {
            print_r( $datas );
        }
        
    echo "</pre>";
}


if ( is_admin() ) {
    $my_settings_page = new mwc_front_Settings_Page();
}



/**********************************************************************/
/*                          SETUP THEME                                */
/**********************************************************************/

/* Register custom navigation walker*/

require_once( $home_path .'/wp_bootstrap_navwalker.php' );


/* Register Theme Features */

function custom_theme_features()  {

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails' );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for Translation
	load_theme_textdomain( 'smoothblue', get_template_directory() . '/lang' );
        
        // Add new roles
        mwc_create_role_revisor();
}
add_action( 'after_setup_theme', 'custom_theme_features' );


/* La gestion des images */

if ( function_exists( 'add_image_size' ) ) { 
	// add_image_size( 'galerie-photo', 285, 145, true );
}



function mwc_title_for_home( $title ) {
    
    if ( empty( $title ) && ( is_home() || is_front_page() ) ) {

            $title = mwc__('Accueil') . ' | ' . get_bloginfo( 'name' );

        } else {

            $title = the_title_attribute() . ' | ' . get_bloginfo( 'name' );

        }

    return $title;
}
add_filter( 'wp_title', 'mwc_title_for_home' );




function my_scripts(){
    wp_enqueue_script( 'jquery-ui-datepicker' );
    
    wp_register_script( 'bootsrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', '', true);
    wp_enqueue_script( 'bootsrap' );
    
    // datepicker-fr
    wp_register_script( 'datePickerFr', get_stylesheet_directory_uri() .'/js/datepicker-fr.js', array('jquery', 'jquery-ui-datepicker'), '', true );
    wp_enqueue_script( 'datePickerFr' );
    
    
    /* MES PLUGINS */

    // jquery.hideArrow
    wp_register_script( 'hideArrow', get_stylesheet_directory_uri() . '/js/jquery.hideArrow.js', array('jquery'), '', true);
    wp_enqueue_script( 'hideArrow' );
    
    // custom
    wp_register_script( 'custom', get_stylesheet_directory_uri() .'/js/custom.js', array('jquery'), '', true);
    wp_enqueue_script( 'custom' );
    
    
    // main
    wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery', 'jquery-ui-datepicker'), '', true);
    
    // pass url to main        
    wp_localize_script('main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
    
    wp_enqueue_script( 'main' );
    
    
    // formTools
    wp_register_script( 'formTools', get_stylesheet_directory_uri() .'/js/formTools.js', array('jquery'), '', true );
    wp_enqueue_script( 'formTools' );
}

add_action('wp_enqueue_scripts', 'my_scripts');




// Register Style
function custom_styles() {

	wp_register_style( 'bootstrap-min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', false, false, 'all' );
	wp_enqueue_style( 'bootstrap-min' );

	wp_register_style( 'bootstrap-optional', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css', false, false, 'all' );
	wp_enqueue_style( 'bootstrap-optional' );

	wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', false, false, 'all' );
	wp_enqueue_style( 'font-awesome' );
        
    wp_register_style( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css', false, false, 'all' );
	wp_enqueue_style( 'jquery-ui' );
        
        
        
    wp_register_style( 'custom', get_stylesheet_directory_uri() .'/css/custom.css', false, false, 'all' );
    wp_enqueue_style( 'custom' );
    
    wp_register_style( 'partners', get_stylesheet_directory_uri() .'/css/partners.css', false, false, 'all' );
    wp_enqueue_style( 'partners' );
    
    wp_register_style( 'main', get_stylesheet_directory_uri() .'/css/main.css', false, false, 'all' );
    wp_enqueue_style( 'main' );
    
    wp_register_style( 'library', get_stylesheet_directory_uri() .'/css/library.css', false, false, 'all' );
    wp_enqueue_style( 'library' );
    
    wp_register_style( 'print', get_template_directory_uri() .'/css/print.css', false, false, 'print' );
    wp_enqueue_style( 'print' );

}
add_action( 'wp_enqueue_scripts', 'custom_styles' );


/* Register Navigation Menus */

function mwc_menus() {

	$locations = array(
		'header-menu' => __( 'Header Menu', 'smoothBlue' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'mwc_menus' );
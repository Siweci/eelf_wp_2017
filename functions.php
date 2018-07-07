<?php

require_once( ABSPATH . 'wp-admin/includes/file.php' );
$home_path = get_home_path();


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
    $my_settings_page = new mwc_front_Church_settings_page();
}



/**********************************************************************/
/*                          SETUP THEME                                */
/**********************************************************************/

/* Register custom navigation walker*/

require_once( get_template_directory() .'/functions/wp_bootstrap_navwalker.php' );


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
        
        // Add theme support for custom logo
        add_theme_support( 'custom-logo' );

	// Add theme support for Translation
	load_theme_textdomain( 'smoothblue', get_template_directory() . '/lang' );
        
        
    // Add new roles
    // mwc_create_role_revisor();
}
add_action( 'after_setup_theme', 'custom_theme_features' );


/* La gestion des images */

if ( function_exists( 'add_image_size' ) ) { 
	 add_image_size( 'galerie-activite', 358, 239, true );
         add_image_size( 'galerie-main-event', 496, 372, true );
         add_image_size( 'benevole-miniature', 80, 80, true);
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
    
//    wp_enqueue_script( 'jquery-ui-datepicker' );
    
    wp_register_script( 'bootsrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script( 'bootsrap' );
    
    
    /* MES PLUGINS */
    
    // custom
    wp_register_script( 'custom', get_stylesheet_directory_uri() .'/js/custom.js', array('jquery'), '', true);
    wp_enqueue_script( 'custom' );
    
    
    // main
    wp_register_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '', true);
    
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
    
    wp_register_style( 'my-buttons', get_stylesheet_directory_uri() .'/css/buttons.css', false, false, 'all' );
    wp_enqueue_style( 'my-buttons' );
    
    wp_register_style( 'main', get_stylesheet_directory_uri() .'/css/main.css', false, false, 'all' );
    wp_enqueue_style( 'main' );

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


/* POLYLANG */

function mwc__($string) {
    if (function_exists('pll_')) {
        return pll__($string);
    } else {
        return __($string, "smoothblue");
    }
}

function mwc_e($string) {
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        _e($string, "smoothblue");
    }
}


/* GOOGLE FUNCTIONS */

function mwc_get_google_photo_id($url) {
    
    /*
     * 
     * @param string url l'url de la photo google
     *      au moins en mode preview
     * @return string id le id de la photo pour qu'il soit exploité dans
     *      <img src"..." />
     */
    
    $re = '/file\/d?\/(\w*)/m';

    preg_match_all($re, $url, $matches, PREG_SET_ORDER, 0);
    
    return $matches[0][1];
}



function mwc_remove_footer_admin($param) {
    
    /**
     * customize footer with society name
     */
    
    echo '<span class="mwc-promo">'
        . 'Une réalisation de '
        . '<a href="http://web-conseil.ch" target="_blank">'
        . 'Montout, Web Conseil'
        . '</a>';
}
add_filter('admin_footer_text', 'mwc_remove_footer_admin');



function mwc_is_empty_content() {
    
    /**
     * check if content is really empty
     */
    
    $content = get_the_content();
    
    $cont = strip_tags($content);
    
    $cont = str_replace('&nbsp;', '', $cont);
    
    return trim($cont) == '';
}



require 'functions/functions-ajax.php';
require 'functions/functions-custom.php';
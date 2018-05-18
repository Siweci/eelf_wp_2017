<?php

/**********************************************************************/
/*                          CUSTOM LOGO                               */
/**********************************************************************/

function theme_prefix_setup() {
	
	add_theme_support( 'custom-logo', array(
            'width'       => 71,
            'height'      => 22,
            'flex-width' => true,
            'header-text' => array()
	) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );


function mwc_custom_logo() {
    
    /**
     * Affiche un custom logo ou un logo par defaut
     */
    
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    
    if ( has_custom_logo() ) {
            echo '<img src="'. esc_url( $logo[0] ) .'">';
    } else {
//            echo '<img src="' . get_stylesheet_directory_uri() . '/img/logo_eelf.svg">';
            echo get_bloginfo( 'description' );
    }
}


function mwc_get_next_sunday() {
    
    /**
     * return the next sunday date and infos
     * @return array next sunday
     */
    
    date_default_timezone_set('Europe/Zurich');
    
    $now = new DateTime();

    // recherche dimanche prochain
    $next_sunday_date = $now->modify('next sunday');
    $next_sunday_timestamp = $next_sunday_date->getTimeStamp();

    setlocale(LC_TIME, 'fr_FR');

    return array(
        'day_number' => $next_sunday_date->format('d'),
        'day_name' => strftime('%A', $next_sunday_timestamp),
        'month' => utf8_encode( strftime('%B', $next_sunday_timestamp) ),
        'year' => $next_sunday_date->format('Y')
    );
    
}


if( function_exists('acf_add_options_page') ) {
	
    acf_add_options_page(array(
        'page_title' 	=> 'Church Settings',
        'menu_title'	=> 'Church Settings',
        'menu_slug' 	=> 'church-main-settings',
        'capability'	=> 'manage_options',
        'icon_url'      => 'dashicons-admin-home'
//        'redirect'	=> false        
    ));

//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Theme Header Settings',
//        'menu_title'	=> 'Header',
//        'parent_slug'	=> 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title' 	=> 'Theme Footer Settings',
//        'menu_title'	=> 'Footer',
//        'parent_slug'	=> 'theme-general-settings',
//    ));
//	
}


/**********************************************************************/
/*                      GOOGLE MAP API KEY                            */
/**********************************************************************/

function my_acf_init() {
	
//    acf_update_setting('google_api_key', 'AIzaSyC8Ksy1ZfTr7OB9BIQiBRB8FqUYUPiWUCk');
    acf_update_setting('google_api_key', 'AIzaSyDuAfEOVs9XbpapBRNeG3EKVwMJ2yE0O1s');
}

add_action('acf/init', 'my_acf_init');
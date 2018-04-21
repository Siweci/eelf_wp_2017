<?php
add_action( 'wp_ajax_frontMain', 'front_main' );
add_action( 'wp_ajax_nopriv_frontMain', 'front_main' );

function front_main() {
    
    $datas= $_POST['datas'];
    
    switch ($datas['action']) {

        case '':

            // sendFormContactDatas($datas);
            break;

        default:
            
            echo "<h4> Sorry no action name provided</h4>";
            break;
    }
    
    wp_die();
}
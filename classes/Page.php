<?php

/**
 * Description of Page
 *
 * @author jmarcm
 */

class mwc_front_Page {
    
    public $page;
    
    function __construct( $args ) {
        
        if ( gettype($args) ) {
            $this->page = get_page_by_path( 'planifier-votre-visite' );
        }
        
    }
    
    
    public function get_content_filter() {
        return get_post_field( 'post_content', $this->page);
    }
    
    
    public function print_content_filter() {
        echo apply_filters ('the_content', $this->get_content_filter() );
    }
}

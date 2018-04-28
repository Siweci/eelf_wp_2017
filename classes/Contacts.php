<?php


/**
 * Description of Contacts
 *
 * @author jmarcm
 */

class mwc_front_Contacts {
    
    private static function get_option() {
        
        return get_option( 'church_contact_infos' );
    }


    /**
     * returns the adress
     * @param string $range
     */
    public static function get_adresse( $range = 'full' ) {
        
        $contact_infos = self::get_option();
        
        $valid_field_names = array( 'rue', 'cp', 'ville' );
        
        if ( $range == 'full' ) {
            
            return $contact_infos['rue'] . ', '
                . $contact_infos['cp'] . ' '
                . $contact_infos['ville'] ;
            
        } else if (in_array($range, $valid_field_names)) {
            
            return $contact_infos[$range];
            
        } else {
            
            return '';
            
        }
        
        
    }
    
    
    public static function print_telephone_link() {
        
        $contact_infos = get_option( 'church_contact_infos' );
        
        $telephone = $contact_infos['telephone'];
        
        $telephone_number = str_replace(
            array('+', ' '),
            array('00', ''),
            $telephone
        );
        
        printf(
            '<a href="tel:%2$s">%1$s</a>',
            $telephone,
            $telephone_number
        );
    }
    
    
    public static function get_full_name() {
        
        $contact_infos = self::get_option();
        
        return $contact_infos['full_name'];
    }
}

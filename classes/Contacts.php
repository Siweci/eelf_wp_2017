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
    
    
    public static function get_info( $name = '' ) {
        
        $contact_infos = self::get_option();
        
        return ( empty($name) ) ? $contact_infos : $contact_infos[$name];
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
    
    
    public static function get_times( $meeting = 'dimanche', $time = ''  ) {
        
        $contact_infos = self::get_option();
        
        $horaire = $contact_infos[$meeting];
        
        $horaire = str_replace(' ', '', $horaire);
        
        $horaires = explode( '-', $horaire );
        
        if ( count($horaires) == 2 ) {

            $end = $horaires[1];

        } else {
            
            $end = '';
        }
        
        if ( $time == 'start' ) {
            
            return $horaires[0];
            
        } else if ($time == 'end') {
            
            return $end;
            
        } else {
            
            return array(
                'start' => $horaires[0],
                'end' => $end
            );
            
        }
    }
}

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
        
        $valid_field_names = array( 'rue', 'complement', 'cp', 'ville' );
        
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
    
    
    public static function print_bloc_adresse() {
        
        $contact_infos = self::get_option();
        
        printf(
               '<p>%1$s</p><p>%2$s</p><p>%3$s %4$s</p>',
                self::get_adresse( 'rue' ),
                self::get_adresse( 'complement' ),
                self::get_adresse( 'cp' ),
                self::get_adresse( 'ville' )
        );
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
        
        
        // vérifie si l'heure de fin du meeting a été renseignée
        
        if ( count($horaires) == 2 ) {

            $end = $horaires[1];

        } else {
            
            $end = '';
        }
        
        
        
        // formate les informations à retourner
        
        if ( $time == 'start' || $time == 'debut' ) {
            
            return $horaires[0];
            
        } else if ( $time == 'end' || $time == 'fin') {
            
            return $end;
            
        } else {
            
            return array(
                'start' => $horaires[0],
                'end' => $end
            );
            
        }
    }
}

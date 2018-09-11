<?php

/**
 * Description of Mails
 *
 * @author jmarcm
 */


class mwc_front_Mails {
    
    public static $subject;
    
    /*
     * Les options
     */
    
    public static $fields = array();
    
    public static $mail_from_name;
    public static $mail_from_mail;
    
    
    
    private static $headers = array();
    
    
    
    
    static function init() {
        
        /**
         * To customize parameters using add_filter in a function file
         *  - wp_mail_from for email adress
         *  - wp_mail_from_name for email name
         */
        
        $self = new self();
        
        
        
        /*
         * Set default values for parameters using filters
         */
        
        // Set email title
        
        add_filter( 'mwc_change_mail_subject', array( $self, 'set_subject' ) );
        
        self::$subject = apply_filters(
                            'mwc_change_mail_subject',
                            "Une demande d'information depuis le site eelf.ch"
        );
        
        
        // Set names for ACF custom key fields
        
        add_filter( 'mwc_custom_acf_options', array( $self, 'set_parameters' ) );
        
        self::$fields = apply_filters(
                            'mwc_custom_acf_options',
                            array(
                                'answer_to_asker' => 'answer_to_asker',
                                'email_partner' => 'email_partner'
                            )
        );
    }
    
    
    static function set_subject( $subject ) {
        return $subject;
    }
    
    static function set_parameters( $default_parameters ) {
        return $default_parameters;
    }
    
    
    
    
    static function set_mail_properties($asker) {
        
        /**
         * will be probably depecretated
         */
        self::$mail_from_name = $asker['name'];
        self::$mail_from_mail = $asker['email'];
    }
    
    
    static function print_mail( $fields, $options = array() ) {
        
        /**
         * affiche les mails
         */
        
        $email_formation_externe = $fields['email_formation_externe'];
        
        $default = array(
            'link_class' => 'btn btn-danger btn-outline pdf',
            'type' => 'buttons'
        );
        
        $settings = array_merge($default, $options);
        
        if ($settings['type'] == 'buttons') {
            
            $pre = '';
            $post = '';
            
        } else {
            
            $pre = '<li class="list-group-item">';
            $post = '</li>';
            
        }

        if( !empty($email_formation_externe) ) {
            
            print ( $pre );
            printf(
                    '<a href="mailto:%1$s" target="_blank" title="%2$s" '
                    . 'class=" email">'
                    . '<i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i><span class="texte">%1$s</span></a>',
                    $email_formation_externe, // href
                    'Demander des renseignements par mail' // title
            );
            
            print ( $post );

        }
    }
    
    
    static function redirect_mail( $fields, $options = array() ) {
        
        /**
         * affiche les mails
         */
        
        $email_formation_externe = $fields['email_formation_externe'];
        
        $default = array(
            'link_class' => 'btn btn-danger btn-outline email',
            'type' => 'buttons'
        );
        
        $settings = array_merge($default, $options);
        
        if ($settings['type'] == 'buttons') {
            
            $pre = '';
            $post = '';
            
        } else {
            
            $pre = '<li class="list-group-item">';
            $post = '</li>';
            
        }
        
        if( !empty($email_formation_externe) ) {
            
            print ( $pre );
            
            printf(
                    '<a href="#" role="button" data-toggle="collapse" data-target=".mail-ask-infos" aria-expanded="false" title="%2$s" '
                    . 'class=" email">'
                    . '<i class="fa fa-envelope-o fa-lg fa-fw" aria-hidden="true"></i><span class="texte">%2$s</span></a>',
                    $email_formation_externe, // href
                    'Demander des renseignements par mail' // title
            );
            
            print ( $post );

        }
    }
    
    
    static function send_local_mail($datas) {
        
        /**
         * enovie des emails en interne <=> aux membres de l'association
         * par exemple après une demande de renseignements
         */
        
        $separator = "<br/>";
        
        $d = self::remove_slashes($datas);
        
        
        
        // les infos du demandeur
        $asker = array(
            'name' => $d['prenom'] . ' ' . $d['nom'],
            'email' => $d['email']
        );
        
        
        
        /*
         * Le reply du mail
         * Par défaut contient les infos du demandeur
         * En option on peut accepter les infos 
         */
        
        
        $answer_to_asker = get_field( self::$fields['answer_to_asker'], $datas['post_id'] );        
        
        
        if ( ! isset( $answer_to_asker) || $answer_to_asker ) {
            
            // -> null : le champ n'a pas été créé pour le post
            // -> true : la champ a été créé et a été coché (valeur par défaut)
            self::$headers[] = "Reply-To: {$asker['name']} <{$asker['email']}>";
            
        } else {
            
            // -> false : il a été créé mais a été décoché
            
            
        }
        
        
        
        /*
         * Détermine le email du destinataire
         */
        
        $fields = self::$fields;
        
        if ( !$fields['use_acf_fields'] && !empty($fields['to']) ) {
            
            $to = $fields['to'];
            
        } else {
            
            $to = get_field( $fields['email_partner'], $datas['post_id'] );
        }
        
        
        if ( empty ($to) ) {
            return json_encode(array(
                'succes' => false,
                'msg' => 'Could not set valid email recipient'
            ));
        }
        
        /*
         * préparation du message
         */
        
        $message = $d['prenom'] .' ' .$d['nom'];
        $message .= ' (<a href="mailto:' . $d['email'] . '">' . $d['email'] .'</a>) '; 
        $message .= 'a écrit : ' .$separator  .$d['message'];
        
        
        
        /*
         * Préparation des pièces jointes
         */
        
        $attachments = array();

        // utilise le mode html
        add_filter( 'wp_mail_content_type', array( get_called_class(),'set_html_content_type' ) );
        
        /*
         * Envoie le mail
         */
        $sent = wp_mail($to, self::$subject, $message, self::$headers, $attachments);
        
        // réinitialise le mode (text)
        remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

        

        $result = array('success' => $sent);
        
        return json_encode($result);
    }
    
    
    
    static function remove_slashes($datas) {

        foreach ($datas as &$value) {

            $value = stripslashes($value);

        }

        return $datas;

    }
    
    
    
    static function set_html_content_type($content_type) {
        return 'text/html';
    }
    
    static function set_mail_from() {
        return self::$mail_from_mail;
    }
    
    static function set_mail_from_name() {
        return self::$mail_from_name;
    }
}

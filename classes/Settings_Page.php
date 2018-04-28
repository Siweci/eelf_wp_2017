<?php

/**
 * Description of Setting_Page
 *
 * @author jmarcm
 */

class mwc_front_Settings_Page {
    
    private $options;
    
    /**
     * Start up
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_option_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    
    /**
     * Add options page
     *  add sub menu page to the Settings menu
     */
    public function add_option_page() {
        add_options_page(
            'Church Admin', // page title
            'Infos de l\'Eglise', // menu title
            'manage_options', // capability
            'church-admin', // menu slug
            array( $this, 'create_admin_page') // callback function
        );
    }
    
    /**
     * Optons page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option( 'church_contact_infos' );
        ?>
        
        <div class="wrap">
            <h1>Les informations de l'Eglise</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'church_option_group' );
                do_settings_sections( 'church-admin' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }
    
    /**
     * Register and add settings
     */
    public function page_init() {
        
        register_setting(
            'church_option_group', // Option group
            'church_contact_infos', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );
        
        
        add_settings_section(
            'general_section_id', // ID
            '', // Title
            array(), // Callback
            'church-admin' // Page slug
        );
        
        
        add_settings_field(
            'full_name', //ID
            'Nom complet de l\'Eglise', // TItle
            array( $this, 'full_name_callback' ), // Callback
            'church-admin',
            'general_section_id'
        );
        
        
        /*
         * Les infos de contact de l'Eglise
         */
        
        add_settings_section(
            'contact_section_id', // ID
            'Les informations de contact', // Title
            array(), // Callback
            'church-admin' // Page slug
        );
        
        add_settings_field(
            'rue', //ID
            'Rue', // TItle
            array( $this, 'rue_callback' ), // Callback
            'church-admin',
            'contact_section_id'
        );
        
        add_settings_field(
            'cp', //ID
            'Code postal', // TItle
            array( $this, 'cp_callback' ), // Callback
            'church-admin',
            'contact_section_id'
        );
        
        add_settings_field(
            'ville', 
            'Ville', 
            array( $this, 'ville_callback' ), 
            'church-admin', 
            'contact_section_id'
        );
        
        add_settings_field(
            'telephone', 
            'Telephone', 
            array( $this, 'telephone_callback' ), 
            'church-admin', 
            'contact_section_id'
        );
    }
    
    
    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        
        $ints = array('cp');
        
        foreach ($input as $key => $value) {
            if ( in_array($key, $ints) ) {
                $new_input[$key] = absint( $value );
            } else {
                $new_input[$key] = sanitize_text_field( $value );
            }
        }

        return $new_input;
    }
    
    
    public function print_section_info() {
        print 'Enter you settings below:';
    }
    
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function full_name_callback() {
        printf(
            '<input type="text" id="full_name" class="regular-text"'
                . 'name="church_contact_infos[full_name]"'
                . 'aria-describedby="full-name-description"'
                . 'value="%s" />',
            isset( $this->options['full_name'] ) ? esc_attr( $this->options['full_name']) : ''
        );
        
        print('<p class="description"'
                . 'id="full-name-description">'
                . 'Le nom complet de l\'Eglise s\'il n\'est pas mentionné dans le slogan'
                . '</p>'
        );
    }
    
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function rue_callback() {
        printf(
            '<input type="text" id="rue" class="regular-text"'
                . 'name="church_contact_infos[rue]"'
                . 'aria-describedby="rue-description" value="%s" />',
            isset( $this->options['rue'] ) ? esc_attr( $this->options['rue']) : ''
        );
        
        print('<p class="description"'
                . 'id="rue-description">Le nom de la rue <strong>et</strong>'
                . ' le numéro séparés par un espace</p>');
    }
    
    public function cp_callback() {
        printf(
            '<input type="text" id="cp"'
                . 'name="church_contact_infos[cp]"'
                . 'aria-describedby="cp-description" value="%s" />',
            isset( $this->options['cp'] ) ? esc_attr( $this->options['cp']) : ''
        );
        
//        print('<p class="description" id="cp-description">Le nom de la rue <strong>et</strong> le numéro</p>');
    }
    
    public function ville_callback() {
        printf(
            '<input type="text" id="ville" class="regular-text"'
                . 'name="church_contact_infos[ville]"'
                . 'value="%s" />',
            isset( $this->options['ville'] ) ? esc_attr( $this->options['ville']) : ''
        );
    }
    
    
    public function telephone_callback() {
        printf(
            '<input type="text" id="telephone" class="regular-text"'
                . 'name="church_contact_infos[telephone]"'
                . 'aria-describedby="telephone-description"'
                . 'value="%s" />',
            isset( $this->options['telephone'] ) ? esc_attr( $this->options['telephone']) : ''
        );
        
        print('<p class="description" id="telephone-description">Au format international +41 26 xxx xx xx</p>');
    }
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback() {
        printf(
            '<input type="text" id="title" name="church_contact_infos[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}




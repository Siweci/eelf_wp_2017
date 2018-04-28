<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting_Page
 *
 * @author macbookpro
 */
class mwc_front_Settings_Page {
    
    private $options;
    
    /**
     * Start up
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }
    
    /**
     * Add options page
     *  add sub menu page to the Settings menu
     */
    public function add_plugin_page() {
        add_options_page(
            'Settings Admin', // page title
            'My Settings', // menu title
            'manage_options', // capability
            'my-setting-admin', // menu slug
            array( $this, 'create_admin_page') // callback function
        );
    }
    
    /**
     * Optons page callback
     */
    public function create_admin_page() {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <h1>My Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
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
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );
        
        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info'), // Callback
            'my-setting-admin' // Page slug
        );
        
        add_settings_field(
            'id_number', //ID
            'ID Number', // TItle
            array( $this, 'id_number_callback' ), // Callback
            'my-setting-admin',
            'setting_section_id'
        );
        
        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'my-setting-admin', 
            'setting_section_id'
        );
    }
    
    
    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        var_dump($input);
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }
    
    
    public function print_section_info() {
        print 'Enter you settings below:';
    }
    
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function id_number_callback() {
        printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]"'
                . 'aria-describedby="id-number-description" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
        
        print('<p class="description" id="id-number-description">Le ID du client</p>');
    }
    
    /** 
     * Get the settings option array and print one of its values
     */
    public function title_callback() {
        printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }
}




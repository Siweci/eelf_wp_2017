<?php

/**
 * Description of SpecialEvents
 *
 * @author jmarcm
 */

class mwc_front_Special_events  extends WP_Query {
    
    public $events; // unused
    
    private $count_argument = 'post_count'; // deprecated
    
    public $count;
    
    
    
    public function __construct($args) {
        
        parent::__construct($args);
        
        $this->count  = $this->post_count;
        
        wp_reset_query();
    }
    
    
    public function display_title() {
        
        if( $this->count == 1) {
            
            esc_html_e( 'Evénement ', 'smoothblue' );
            
        } else {
            
            esc_html_e( 'Evénements exceptionnels', 'smoothblue' );
            
        }
    }
    
    
    public function display_events() {
        
        while ( $this->have_posts() ) : $this->the_post();
        echo "col-md-" . 12 / $this->count;
        ?>

            <section id="<?php echo "special-event-" . get_the_ID(); ?>" <?php post_class( 'special-event col-xs-12 col-md-6' ); ?>>

                <div class="row">

                    <?php

                    get_template_part ( 'parts/special-event-image', 'multi' );

                    ?>

                </div>

            </section>

        <?php endwhile;
    }
    
    
    public function wrapper_class() {
        
        $class = 'col-xs-12 ';
        
        switch ($this->count) {
            
            case 1:

                
                break;
            
            case 2:
                
                $class .= 'col-md-8 col-md-offset-2';
                break;
            
            case 3:
                
                $class .= 'col-md-10 col-md-offset-1';

            default:
                break;
        }
        
        printf("class='%s'", $class);
        
    }
    
    
    public function main_class() {
        
        echo post_class( 'special-event col-xs-12 ' .  'col-md-' . 12 / $this->count );
        
    }
    
    
    
    public function single_image_class() {
        
        $class = 'single-image col-xs-12 ';
        
        if( $this->count <= 2 ) {
            
            $class .= 'col-md-10 col-md-offset-1';
            
        } else {
            
            $class .= 'col-md-10 col-md-offset-1';
            
        }
        
        printf("class='%s'", $class);
    }
    
    
    public function get_end_name() {
        
        if ( $this->count == 1 ) {
            
            $tableau = get_field ( 'tableau' );

            return (empty ( $tableau ) ) ? 'single' : 'table';
            
        } else {
            
            return 'multi';
        }
        
    }
    
    /**
     * Affiche un bouton si il y a plus de 3 posts (événements spéciaux)
     */
    public function display_to_archive_button() {
        
        if ( $this->found_posts > $this->count ) {
            
            // recherche des informations de cette categorie
            $categories = get_the_category();
            $current_category = $categories[0];
            $current_category_id = $current_category->cat_ID;
            
            // recherche l'URL de cette catégorie
            $current_category_link = get_category_link( $current_category_id );
        ?>
            
            <div class="col-xs-12 col-md-4 col-md-offset-4">

                <a href="<?php echo esc_url( $current_category_link ); ?>"
                   class="to-archive btn btn-lg btn-block btn-black btn-outline">Voir plus d'événements</a>

            </div>
            
        <?php
        
        }
        
    }
    
    
    /**
     * Affiche un tag pour indiquer que l'événement a déjà eu lieu
     */
    public function display_time_tag() {
        
        if ( get_field('date_debut') < date("Y-m-d") ) {
            echo '<div class="passed text-center">Cet événement a déjà eu lieu</div>';
        }
        
    }
    
}

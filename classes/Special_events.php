<?php

/**
 * Description of SpecialEvents
 *
 * @author jmarcm
 */

class mwc_front_Special_events  extends WP_Query {
    
    public $events;
    
    private $count_argument = 'post_count';
    
    public $count;
    
    
    
    public function __construct($args) {
        
        parent::__construct($args);
        
        $this->count  = $this->{$this->count_argument};
        
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
    
}

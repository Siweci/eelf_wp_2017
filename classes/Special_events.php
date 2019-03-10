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
            
            echo esc_html_e( 'Evénement ', 'smoothblue' );
            
        } else {
            
            echo esc_html_e( 'Evénements exceptionnels', 'smoothblue' );
            
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
    
    
    public function main_class() {
//        global $post;
        
//        return 'col-md-' . 12 / $this->count;
        
        return post_class( 'special-event col-xs-12 ' .  'col-md-' . 12 / $this->count );
    }
    
}

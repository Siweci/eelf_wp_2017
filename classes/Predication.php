<?php

/**
 * Description of Predication
 *
 * @author macbookpro
 */

class mwc_front_Predication {
    
    public $ID;
    
    public $link;
    public $link_target;


    public function __construct($post_id) {
        
        $this->ID = $post_id;
    }
    
    
    /**
     * Cette fonction est utilisée avec array_map
     * pour ajouter un hashtag devant chaque nom
     * @param object $item
     * @return string
     */
    private function add_hashtag($item) {

        return '#' . $item->name;
    }
    
    
    /**
     * Récupère la taxonomie 'tag_predication' des prédications
     * Renvoie un tableau des mots clés précédés d'un hashtag
     * @return array
     */
    public function get_tags() {
        
        $predication_tags = get_the_terms( $this->ID, 'tag_predication');
        
        if ($predication_tags) {
            
            return array_map(array($this, 'add_hashtag'), $predication_tags);
            
        } else {
            
            return array();
            
        }
        
    }
    
    
    /**
     * Attribue comme lien du message par ordre de priorité
     *      - le lien externe
     *      - le lien interne
     */
    public function set_link() {
        
//        $this->lien =
//                get_field( 'lien_externe', $this->ID ) ? : 
//                get_field( 'lien_local', $this->ID ) ? :
//                '';
        
        if ( get_field( 'lien_externe', $this->ID ) ) {
            
            $this->link = get_field( 'lien_externe', $this->ID );
            $this->link_target = '_blank';
            
        } else if ( get_field( 'lien_local', $this->ID ) ) {
            
            $this->link = get_field( 'lien_local', $this->ID );
            $this->link_target = '';
            
        } else {
            
            $this->link = '';
            $this->link_target = '';
        }
    }
    
    
    /**
     * Définit les balises qui entourent l'icone principale
     * si 
     */
    public function print_main_icone_wrapper_open() {
        
        $this->set_link();
        
        if ( !empty( $this->link) ) {
            
            printf('<a href="%1$s" target="%2$s" class="icone col-xs-12 col-md-3">',
                    $this->link, $this->link_target);
            
        } else {
            
            print('<div class="icone col-xs-12 col-md-3">');
        }
    }
    
    
    public function print_main_icone_wrapper_close() {
        
        if ( !empty( $this->link) ) {
            
            print('</a>');
            
        } else {
            
            print('</div>');
        }
    }
    
}

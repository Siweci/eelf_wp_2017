<?php

/**
 * Description of Predication
 *
 * @author macbookpro
 */

class mwc_front_Predication {
    
    public $ID;
    
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
        
        return array_map(array($this, 'add_hashtag'), $predication_tags);
    }
    
}

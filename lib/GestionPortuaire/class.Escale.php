<?php
ini_set('display_errors', 1);

class Escale {

    /**
     * Date d'entrée de l'Escale
     */
    private $dateEntree;
    
    /**
     * Date de sortie de l'Escale
     */
    private $dateSortie;
    
    /**
     * Navire qui fait l'Escale
     */
    private $navire;
    
    public function __construct($dateEntree, $dateSortie) {
        $this->dateEntree = $dateEntree;
        $this->dateSortie = $dateSortie;
    }   
    
    /**
     * Retourne la date d'entrée de l'Escale
     */
    public function getDateEntree() {
        return $this->dateEntree;
    }
    
    /**
     * Retourne la date de sortie de l'Escale
     */
    public function getDateSortie() {
        return $this->dateSortie;
    }
    
    /**
     * Retourne le Navire associé à l'Escale
     */
    public function getNavire() {
        return $this->navire;
    }
    
    /**
     * Associe un Navire à l'Escale
     */
    public function setNavire(Navire $navire) {
        $this->navire = $navire;
    }
}

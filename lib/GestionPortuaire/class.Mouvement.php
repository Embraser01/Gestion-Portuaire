<?php
ini_set('display_errors', 1);

class Mouvement {
    
    /**
     * L'identifiant du Mouvement
     */
    private $id;
    
    /**
     * Le chargement du Mouvement
     */
    private $chargement;
    
    /**
     * Le Conteneur associé au Mouvement
     */
    private $conteneur;
    
    /**
     * L'Escale associée au Mouvement
     */
    private $escale;
    
    public function __construct($id, $chargement, Conteneur $conteneur, Escale $escale) {
        $this->id = $id;
        $this->chargement = $chargement;
        $this->conteneur = $conteneur;
        $this->escale = $escale;
    }
    
    /**
     * Retourne l'identifiant du Mouvement
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Retourne le chargement du Mouvement
     */
    public function getChargement() {
        return $this->chargement;
    }
    
    /**
     * Retourne le Conteneur associé au Mouvement
     */
    public function getConteneur() {
        return $this->conteneur;
    }
    
    /**
     * Associe un nouveau Conteneur au Mouvement
     */
    public function setConteneur(Conteneur $conteneur) {
        $this->conteneur = $conteneur;
    }
    
    /**
     * Retourne l'Escale associé Mouvement
     */
    public function getEscale() {
        return $this->escale;
    }
    
    /**
     * Associe une nouvelle Escale au Mouvement
     */
    public function setEscale(Escale $escale) {
        $this->escale = $escale;
    }
}
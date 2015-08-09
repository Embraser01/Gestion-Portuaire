<?php
class Navire {
    
    /**
     * Compagnie du Navire
     */
    private $compagnie;
    
    /**
     * Nom du Navire
     */
    private $nom;
    
    /**
     * Capacité du Navire
     */
    private $capacite;
    
    /**
     * Conteneurs du Navire
     */
    private $conteneurs = [];
    
    /**
     * Escale du Navire
     */
    private $escale;
    
    public function __construct($id, $nom, $capacite, $compagnie, $escale = null) {
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->compagnie = $compagnie;
        $this->escale = $escale;
    }
    
    /**
     * Retourne la Compagnie du Navire
     */
    public function getCompagnie() {
        return $this->compagnie;
    }
    
    /**
     * Associe un Navire à une Compagnie
     */
    public function setCompagnie(Compagnie $compagnie) {
        $this->compagnie = $compagnie;
    }
    
    /**
     * Retourne le nom du Navire
     */
    public function getNom() {
        return $this->nom;
    }
    
    /**
     * Retourne l'Escale du Navire
     */
    public function getEscale() {
        return $this->escale;
    }
    
    /**
     * Associe une Escale au Navire
     */
    public function setEscale(Escale $escale) {
        $this->escale = $escale;
    }
    
    /**
     * Retourne la capacité du Navire
     */
    public function getCapacite() {
        return $this->capacite;
    }
    
    /**
     * Vérifie si un Conteneur appartient déjà au Navire
     */
    public function containsConteneur(Conteneur $conteneur) {
        return isset($this->conteneurs[$conteneur]);
    }
    
    /**
     * Ajoute un Conteneur au Navire
     */
    public function addConteneur(Conteneur $conteneur) {
        if(!$this->containsConteneur($conteneur)) {
            $navire->setNavire($this);
            $this->conteneurs[] = $conteneur;
        }
    }
    
    /**
     * Supprime un Conteneur du Navire
     */
    public function removeConteneur(Conteneur $conteneur) {
        if($this->containsConteneur($conteneur)) {
            $this->conteneurs[$conteneur]->setNavire(null);
            unset($this->conteneurs[$conteneur]);
        }
    }
    
    /**
     * Retourne tous les Conteneurs du Navire
     */
    public function getConteneurs() {
        return $this->conteneurs;
    }
}

<?php
ini_set('display_errors', 1);

class Compagnie {
    
    /**
     * Identifiant de la Compagnie
     */
    private $id;
    
    /**
     * Nom de la Compagnie
     */
    private $nom;
    
    /**
     * Adresse de la Compagnie
     */
    private $adresse;
    
    /**
     * Pays de la Compagnie
     */
    private $pays;
    
    /**
     * Les Navires de la Compagnie
     */
    private $navires = [];
    
    public function __construct($id, $nom, $adresse, $pays) {
        $this->id = $id;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->pays = $pays;
    }
    
    /**
     * Retourne l'identifiant de la Compagnie
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Retourne le nom de la Compagnie
     */
    public function getNom() {
        return $this->nom;
    }
    
    /**
     * Retourne l'adresse de la Compagnie
     */
    public function getAdresse() {
        return $this->adresse;
    }
    
    /**
     * Retourne le pays de la Compagnie
     */
    public function getPays() {
        return $this->pays;
    }
    
    /**
     * Vérifie si un Navire appartient déjà à la Compagnie
     */
    public function containsNavire(Navire $navire) {
        return isset($this->navires[$navire]);
    }
    
    /**
     * Ajoute un Navire à la Compagnie
     */
    public function addNavire(Navire $navire) {
        if(!$this->containsNavire($navire)) {
            $navire->setCompagnie($this);
            $this->navires[] = $navire;
        }
    }
    
    /**
     * Supprime un Navire de la Compagnie
     */
    public function removeNavire(Navire $navire) {
        if($this->containsNavire($navire)) {
            $this->navires[$navire]->setCompagnie(null);
            unset($this->navires[$navire]);
        }
    }
    
    /**
     * Retourne tous les Navires de la Compagnie
     */
    public function getNavires() {
        return $this->navires;
    }
}

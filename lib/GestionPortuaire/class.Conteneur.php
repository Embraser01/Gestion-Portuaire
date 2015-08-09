<?php
ini_set('display_errors', 1);

class Conteneur {
    
    /**
     * Identifiant du Conteneur
     */
    private $id;
    
    /**
     * Capacité du Conteneur (en EVP)
     */
    private $capacite;
    
    /**
     * Navire contenant le Conteneur
     */
    private $navire;
    
    /**
     * Client associé au Conteneur
     */
    private $client;
    
    public function __construct($id, $capacite, Navire $navire, Client $client) {
        $this->id = $id;
        $this->navire = $navire;
        $this->capacite = $capacite;
        $this->client = $client;
    }
    
    /**
     * Associe un Navire au Conteneur
     */
    public function setNavire(Navire $navire) {
        $this->navire = $navire;
    }
    
    /**
     * Retourne le Navire associé au Conteneur
     */
    public function getNavire() {
        return $this->navire;
    }
    
    /**
     * Associe un Client au Conteneur
     */
    public function setClient(Client $client) {
        $this->client = $client;
    }
    
    /**
     * Retourne le Client associé au Conteneur
     */
    public function getClient() {
        return $this->client;
    }
}
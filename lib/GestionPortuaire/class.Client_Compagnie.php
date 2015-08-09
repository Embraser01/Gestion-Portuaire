<?php
class Client_Compagnie {
    
    /**
     * Identifiant de la relation
     */
    private $id;

    /**
     * Client de la relation
     */
    private $client;
    
    /**
     * Compagnie de la relation
     */
    private $compagnie;
    
    public function __construct($id, Client $client, Compagnie $compagnie) {
        $this->id = $id;
        $this->client = $client;
        $this->compagnie = $compagnie;
    }
    
    /**
     * Retourne l'identifiant de la relation
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Retourne le Client de la relation
     */
    public function getClient() {
        return $this->client;
    }
    
    /**
     * Retourne la Compagnie de la relation
     */
    public function getCompagnie() {
        return $this->compagnie;
    }
}
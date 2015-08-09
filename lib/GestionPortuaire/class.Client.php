<?php
require_once __DIR__ . "/class.Personne.php";

class Client extends Personne {
	
	/**
	 * Identifiant du Client
	 */
	private $id;
	
	/**
	 * Nom du Client
	 */
	private $nom;
	
	/**
	 * Adresse du Client
	 */
	private $adresse;
	
	/**
	 * Conteneurs associés au Client
	 */
	private $conteneurs = [];
	
	
	public function __construct($id, $nom, $adresse, $email) {
	    parent::__construct($email);
		$this->id = $id;
		$this->nom = $nom;
		$this->adresse = $adresse;
	}
	
	/**
	 * Retourne l'ID du Client
	 */
	public function getId() {
	    return $this->id;
	}
	
	/**
	 * Retourne le nom du Client
	 */
	public function getNom() { 
	    return $this->nom;
	}
	
	/**
	 * Retourne l'adresse du Client
	 */
	public function getAdresse() {
	    return $this->adresse;
	}
	
    /**
     * Vérifie si un Conteneur appartient déjà à la Client
     */
    public function containsConteneur(Conteneur $conteneur) {
        return isset($this->conteneurs[$conteneur]);
    }
    
    /**
     * Ajoute un Conteneur à la Client
     */
    public function addConteneur(Conteneur $conteneur) {
        if(!$this->containsConteneur($conteneur)) {
            $conteneur->setClient($this);
            $this->conteneurs[] = $conteneur;
        }
    }
    
    /**
     * Supprime un Conteneur de la Client
     */
    public function removeConteneur(Conteneur $conteneur) {
        if($this->containsConteneur($conteneur)) {
            $this->conteneurs[$conteneur]->setClient(null);
            unset($this->conteneurs[$conteneur]);
        }
    }
    
    /**
     * Retourne tous les Conteneurs de la Client
     */
    public function getConteneurs() {
        return $this->conteneurs;
    }
}

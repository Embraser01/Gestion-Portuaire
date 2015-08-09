<?php
ini_set('display_errors', 1);

require_once "class.Personne.php";

class AgentPortuaire extends Personne {
    
    /**
     * Identifiant de l'AgentPortuaire
     */
    private $id;
    
    /**
     * Nom de l'AgentPortuaire
     */
    private $nom;
    
    public function __construct($id, $nom, $email) {
        parent::__construct($email);
        $this->id = $id;
    	$this->nom = $nom;
    }
    
    /**
     * Retourne l'ID de l'AgentPortuaire
     */
    public function getId() {
        return $this->id;
    }
    
    /**
     * Retourne le nom de l'AgentPortuaire
     */
    public function getNom() {
    	return $this->nom;
    }
}

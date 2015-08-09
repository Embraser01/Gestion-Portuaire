<?php
ini_set('display_errors', 1);

class Personne {
    /**
     * Adresse E-Mail de la Personne
     */
    protected $email;
    
    public function __construct($email) {
        $this->email = $email;
    }
    
    /**
     * Retourne l'adresse e-mail de la Personne
     */
    public function getEmail() {
        return $this->email;
    }
}
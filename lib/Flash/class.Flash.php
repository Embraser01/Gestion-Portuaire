<?php
//ini_set('display_errors', 1);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class Flash {
    
    public static function log($msg, $type) {
        if(!isset($_SESSION['Flash'])) {
            $_SESSION['Flash'] = [];
        }
        
        if(!isset($_SESSION['Flash'][$type])) {
            $_SESSION['Flash'][$type] = [];
        }
        
        $_SESSION['Flash'][$type][] = $msg;
    }
    
    public static function error($msg) {
        Flash::log($msg, 'errors');
    }
    
    public static function success($msg) {
        Flash::log($msg, 'successes');
    }
    
    public static function getLogs($type) {
        if(!isset($_SESSION['Flash'][$type])) {
            $_SESSION['Flash'][$type] = [];
        }
        
        $truc = $_SESSION['Flash'][$type];
        $_SESSION['Flash'][$type] = [];
        
        return $truc;
    }
    
    public static function getErrors() {
        return self::getLogs('errors');
    }
    
    public static function getSuccesses() {
        return self::getLogs('successes');
    }
}

//Flash::error("Erreur !!!"); // ajoute une erreur
//$errors = Flash::getErrors(); // vide les erreurs

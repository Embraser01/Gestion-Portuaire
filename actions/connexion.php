<?php

session_start();

require __DIR__ . '/../lib/Database/class.Database.php';
require_once __DIR__ . '/../lib/Flash/class.Flash.php';

if (empty($_POST["email"])) {
    Flash::error("Adresse e-mail vide.");
    header('Location: ../connexion.php');
} elseif (empty($_POST["password"])) {
    Flash::error("Mot de passe vide.");
    header('Location: ../connexion.php');
} else {
    $stmt  = $db->prepare('SELECT email,mdp,personneTypeId FROM Personne WHERE email= :email;');
    $stmt->bindParam(':email', htmlentities($_POST["email"]), PDO::PARAM_STR);
    $stmt ->execute();
    $rslt = $stmt->fetch(PDO::FETCH_OBJ);
    
    if(hash('sha256', $_POST["password"].'ChickenBrothers') == $rslt->mdp) {
        $_SESSION["email"] = htmlentities($rslt->email);
        $_SESSION["personneTypeId"] = htmlentities($rslt->personneTypeId);
        
        header('Location: ../mon_compte.php');
    } else {
        //Erreur mot de passe
        Flash::error("Mot de passe incorect.");
        header('Location: ../connexion.php');
    }
}

?>
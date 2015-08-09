<?php
ini_set('display_errors', 1);

if(empty($_POST)) {
    header('Location: /Codiad/workspace/');
}

require __DIR__ . '/../lib/Database/class.Database.php';
require __DIR__ . '/../lib/Flash/class.Flash.php';

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    Flash::error("Veuillez entrer une adresse e-mail correcte.");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$req = $db->prepare('SELECT id FROM Personne WHERE email = :email');
$req->bindParam('email', $_POST['email'], PDO::PARAM_STR);
$req->execute();
$res = $req->fetch();

if($req->rowCount() == 0) {
    $req->closeCursor();
    
    if($_POST['mdp'] == $_POST['mdp_confirmation']) {
        
        try {
	        $mdpHash = hash('sha256', $_POST["mdp"].'ChickenBrothers');
	        $req = $db->prepare('INSERT INTO Personne(email, mdp, personneTypeId) VALUES(:email, :mdp, 3)');
	        $req->bindParam('email', $_POST['email'], PDO::PARAM_STR);
	        $req->bindParam('mdp', $mdpHash, PDO::PARAM_STR);
	        $req->execute();
        } catch(PDOException $e) {
        	var_dump($e);
        }
        
        // L'utilisateur est connecté
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["personneTypeId"] = 3;
        header('Location: ../mon_compte.php');

        
    } else {
        Flash::error("Les mots de passes renseignés ne sont pas identiques.");
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
} else {
    Flash::error("L'adresse e-mail renseignée est déjà dans la base de données");
    header('Location: ' . $_SERVER['HTTP_REFERER']);    
}

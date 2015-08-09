<?php
ini_set('display_errors', 1);
$title = "Ajouter une compagnie";
include('includes/header.php');
require_once __DIR__ . '/lib/Database/class.Database.php';
require_once __DIR__ . '/lib/Flash/class.Flash.php';

if(!isset($_SESSION["email"])) {
    //Erreur
    header('Location: connexion.php');
    die();
}

if(!empty($_POST)) {
    
    $req = $db->prepare('SELECT id FROM Personne_CompagnieMaritime WHERE nom = :nom');
    
    $req->bindValue('nom', $_POST['name'], PDO::PARAM_STR);
    
    $req->execute();
    $res = $req->fetch();
    
    if($res == false) {
        
        if($_POST['password'] == $_POST['password2']) {
            try {
                $mdpHash = hash('sha256', $_POST["password"].'ChickenBrothers');
                $req = $db->prepare('INSERT INTO Personne(mdp, email, personneTypeId) VALUES(:mdp, :email, 2)');
                $req->bindValue('mdp', $mdpHash, PDO::PARAM_STR);
                $req->bindValue('email', $_POST['email'], PDO::PARAM_STR);
                $req->execute();
                
            } catch(PDOException $e) {
                var_dump($e);
            }
            
            $personneId = $db->lastInsertId();
            
            try {
                $req = $db->prepare('INSERT INTO Personne_CompagnieMaritime(personne_id, nom, adresse, pays) VALUES(:personne_id, :nom, :adresse, :pays)');
                $req->bindValue('personne_id', $personneId, PDO::PARAM_INT);
                $req->bindValue('nom', $_POST['name'], PDO::PARAM_STR);
                $req->bindValue('adresse', $_POST['address'], PDO::PARAM_STR);
                $req->bindValue('pays', $_POST['country'], PDO::PARAM_STR);
                $req->execute();
            } catch(PDOException $e) {
                var_dump($e);
            }
            
            Flash::success("La compagnie a bien été ajoutée");
            header('Location: mon_compte.php');
            
        } else {
            Flash::error("Les mots de passe sont différents");   
        }
    } else {
        Flash::error("Il existe déjà une Compagnie portant ce nom");
    }
    
}


?>

<h1>Ajouter une compagnie</h1>

<div class="jumbotron text-left">

    <?php
    	$errors = Flash::getErrors();
    	foreach($errors as $error) {
    	    echo '<b style="color:red">' . $error . "</b>";
    	}
	?>
	
    <form action="" method="post">
        <div class="form-group">
            <label for="input-name">Nom de la compagnie</label>
            <input type="text" name="name" class="form-control" id="input-name" placeholder="Nom">
        </div>
        
        <div class="form-group">
            <label for="input-address">Adresse de la compagnie</label>
            <input type="text" name="address" class="form-control" id="input-address" placeholder="Adresse">
        </div>
        
        <div class="form-group">
            <label for="input-country">Pays de la compagnie</label>
            <input type="text" name="country" class="form-control" id="input-country" placeholder="Pays">
        </div>
        
        <div class="form-group">
            <label for="input-email">Adresse e-mail</label>
            <input type="email" name="email" class="form-control" id="input-email" placeholder="Entrez une adresse e-mail">
        </div>
        <div class="form-group">
            <label for="input-password">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="input-password" style="font-size:14px; margin:0; border:1px solid #ccc" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="input-password2">Mot de passe (confirmation)</label>
            <input type="password" name="password2" class="form-control" id="input-password2" style="font-size:14px; margin:0; border:1px solid #ccc" placeholder="Mot de passe">
        </div>
        
        <p class="text-center"><button type="submit" class="btn btn-primary">Enregistrer une nouvelle compagnie</button> <a href="mon_compte.php" class="btn btn-danger">Retour</a></p>
    </form>
	
</div>

<?php

include('includes/footer.php');

?>
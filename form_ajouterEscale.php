<?php
$title = "Ajouter une escale";
include('includes/header.php');

require_once __DIR__ . '/lib/Database/class.Database.php';
require_once __DIR__ . '/lib/Flash/class.Flash.php';

if(!isset($_SESSION["email"])) {
    //Erreur
    header('Location: connexion.php');
    die();
}

if(!empty($_POST)) {
    
    try {
        var_dump($_POST);
        
        if(!empty($_POST['compagnie'])) {
            
            $req = $db->query('SELECT id FROM Personne_CompagnieMaritime ORDER BY id DESC LIMIT 1');
            $lastId = $req->fetch();
            
            $req = $db->prepare('INSERT INTO Escale(Com_id, Nav_id, dateEntree, dateSortie) VALUES (:Com_id, :Nav_id, :dateEntree, :dateSortie');
            $req->bindValue('Com_id', $_POST['compagnie'], PDO::PARAM_INT);
            $req->bindValue('id', $lastId->id + 1, PDO::PARAM_INT);
            $req->execute();
            
            Flash::success('Le navire a bien été ajouté à la compagnie n°' . htmlspecialchars($_POST['compagnie']));
            header('Location: mon_compte.php');
            
        } else {
            Flash::error('Veuillez sélectionner une compagnie');
        }
    } catch(PDOException $e) {
        header('Location: form_ajouterEscale.php');
    }
}

?>

<h1>Ajouter une escale</h1>

<div class="jumbotron text-left">

     <?php
    	$successes = Flash::getSuccesses();
    	foreach($successes as $success) {
    	    echo '<b style="color:green">' . $success . "</b>";
    	}
    	
    	$errors = Flash::getErrors();
    	foreach($errors as $error) {
    	    echo '<b style="color:red">' . $error . "</b>";
    	}
	?>
	
    <form action="" method="post">
        <div class="form-group">
            <label for="input-name">Nom de la compagnie possédant le navire</label>

            <select name="compagnie" class="form-control" id="input-name">
            <option></option>   
            <?php 
            $req = $db->query('SELECT id, nom, adresse, pays FROM Personne_CompagnieMaritime');
            $res = $req->fetchAll();
            
            foreach($res as $comp) {
                echo '<option value="' . $comp->id . '">' . $comp->id . ' - ' . $comp->nom . ' ' . $comp->pays . ' ' . $comp->adresse . "</option>";
            }
            ?>
            </select>
        </div>
        <div class="form-group">

        <div class="form-group">
            <label for="input-name">Nom du Bateau</label>

            <select name="compagnie" class="form-control" id="input-name">
            <option></option>   
            <?php 
            $req = $db->query('SELECT id FROM Navire');
            $res = $req->fetchAll();
            
            foreach($res as $comp) {
                echo '<option value="' . $comp->id;
            }
            ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="input-country">Date de départ</label>
            <input type="date" name="dateD" class="form-control" id="input-country" placeholder="Date de depart">
        </div>
        
        <div class="form-group">
            <label for="input-email">Date arrivée</label>
            <input type="date" name="dateF" class="form-control" id="input-email" placeholder="Date d'arrivé">
        </div>
        
        <p class="text-center"><button type="submit" class="btn btn-primary">Enregistrer une nouvelle escale</button> <a href="mon_compte.php" class="btn btn-danger">Retour</a></p>
    </form>
	
</div>

<?php

include('includes/footer.php');

?>
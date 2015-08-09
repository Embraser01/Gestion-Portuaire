<?php
ini_set('display_errors', 1);

$title = "Ajouter un mouvement";
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
		$req = $db->prepare('INSERT INTO Mouvement(Com_id, Nav_id, Con_id, Esc_id, chargement) VALUES(:Com_id, :Nav_id, :Con_id, :Esc_id, :chargement)');
		$req->bindValue('Com_id', htmlentities($_POST["input-compagnie"]), PDO::PARAM_STR);
		$req->bindValue('Nav_id', htmlentities($_POST["input-navire"]), PDO::PARAM_STR);
		$req->bindValue('Con_id', htmlentities($_POST["input-compagnie"]), PDO::PARAM_STR);
		$req->bindValue('Esc_id', htmlentities($_POST["input-escale"]), PDO::PARAM_STR);
		$req->bindValue('chargement', htmlentities($_POST["input-chargement"]), PDO::PARAM_STR);
		
		$req->execute();
	} catch (PDOException $e) {
		Flash::error("Le formulaire n'est pas valide.");
		//Flash::error($e);
		
		header('Location: form_ajouterMouvement.php');
	}
}

?>

<h1>Ajouter un mouvement</h1>

<div class="jumbotron text-left">

    <?php
    	$errors = Flash::getErrors();
    	foreach($errors as $error) {
    	    echo '<b style="color:red">' . $error . "</b>";
    	}
	?>
	
    <form action="" method="post">
        <div class="form-group">
            <label for="input-compagnie">Nom de la compagnie</label>
            <select name="input-compagnie" class="form-control" id="input-compagnie">
            <option></option>
            <?php
            	$req = $db->query('SELECT id, nom, adresse, pays FROM Personne_CompagnieMaritime');
            	$res = $req->fetchAll();
            
            	foreach($res as $comp) {
            	    echo '<option value="' . $comp->id . '">' . $comp->id . ' - Compagnie ' . $comp->nom . ' (' . $comp->pays . ') [' . $comp->adresse . "]</option>";
            	}
            	?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="input-navire">Numéro du navire</label>
            <select name="input-navire" class="form-control" id="input-navire">
            <option></option>
            <?php
            	$req = $db->query('SELECT id, Com_id FROM Navire');
            	$res = $req->fetchAll();
            
            	foreach($res as $comp) {
            	    echo '<option value="' . $comp->id . '">N° '. $comp->id . ' de la compagnie ' . $comp->Com_id . "</option>";
            	}
            	?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="input-country">Numéro du conteneur</label>
            <select name="input-navire" class="form-control" id="input-navire">
            <option></option>
            <?php
            	$req = $db->query('SELECT Com_id, Nav_id, id, Cli_id, evp FROM Conteneur');
            	$res = $req->fetchAll();
            
            	foreach($res as $comp) {
            	    echo '<option value="' . $comp->id . '">N° ' . $comp->id . ' de la compagnie ' . $comp->Com_id . ' du navire ' . $comp->Nav_id . ' du client ' . $comp->Cli_id . ' de taille ' . $comp->evp . "</option>";
            	}
            	?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="input-escale">Numéro de l'escale</label>
            <select name="input-navire" class="form-control" id="input-navire">
            <option></option>
            <?php
            	$req = $db->query('SELECT id, Com_id, Nav_id, dateEntree, dateSortie FROM Escale');
            	$res = $req->fetchAll();
            
            	foreach($res as $comp) {
            	    echo '<option value="' . $comp->id . '">N° ' . $comp->id . ' de la compagnie ' . $comp->Com_id . ' du navire ' . $comp->Nav_id . ' entré le ' . $comp->dateEntree . ' et sortie le ' . $comp->dateSortie . "</option>";
            	}
            	?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="input-chargement">Type de mouvement</label>
            <p><input type="radio" name="input-chargement" value="1"> Chargement
			<input type="radio" name="input-chargement" value="0"> Déchargement</p>
        </div>
        
        <p class="text-center"><button type="submit" class="btn btn-primary">Enregistrer un nouveau mouvement</button> <a href="mon_compte.php" class="btn btn-danger">Retour</a></p>
    </form>
	
</div>

<?php

include('includes/footer.php');

?>
<?php
ini_set('display_errors', 1);
require_once __DIR__ . '/lib/Flash/class.Flash.php';

$title = "Mon compte";
include('includes/header.php');

require_once __DIR__ . '/lib/Flash/class.Flash.php';

if(!isset($_SESSION["email"])) {
    //Erreur
    header('Location: connexion.php');
}

?>

<h1>Mon compte</h1>

<div class="jumbotron text-center">
	<p>Bonjour <i><?php echo $_SESSION["email"] ?></i> !</p>
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
    	
	<ul style="list-style-type:none;">
		<li><a href="form_ajouterCompagnie.php" class="btn btn-primary">Ajouter une compagnie</a></li>
		<br>
		<li><a href="form_ajouterClient.php" class="btn btn-warning">Ajouter un client</a></li>
		<br>
		<li><a href="form_ajouterNavire.php" class="btn btn-success">Ajouter un navire</a></li>
		<br>
		<li><a href="form_ajouterEscale.php" class="btn btn-info">Ajouter une escale</a></li>
		<br>
		<li><a href="form_ajouterMouvement.php" class="btn btn-default">Ajouter un mouvement</a></li>
	
	</ul>
</div>

<?php

include('includes/footer.php');

?>
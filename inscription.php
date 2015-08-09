<!DOCTYPE html>
<?php
ini_set('display_errors', '1');

$title = "Inscription";
include('includes/header.php');
require_once __DIR__ . '/lib/Flash/class.Flash.php';
?>

<div id="inscrption">

	<h1>Inscription</h1>
	
	<?php
	$errors = Flash::getErrors();
	foreach($errors as $error) {
	    echo '<b style="color:red">' . $error . "</b>";
	}
	
	?>
	
	<!--
    <div id="radioButton">
        <li><input type= "radio" name="choixPersonne" value="Client"> Client</li>
        <li><input type= "radio" name="choixPersonne" value="Compagnie"> Compagnie</li>
    </div>
    -->
    <form action="actions/inscription.php" method="post">
	    <div id="texte">
	        <ul>
	            <li><input type="text" name="email" placeholder="Votre E-mail"></li>
	            <li><input type="password" name="mdp" placeholder="Votre mot de passe"></li>
	            <li><input type="password" name="mdp_confirmation" placeholder="Votre mot de passe (confirmation)"></li>
	        </ul>
	    </div>
	    
	    <div id="bouton">
	        <input type="submit" value="S'inscrire">
	    </div>
    </form>
</div>
	
<?php

include('includes/footer.php');

?>
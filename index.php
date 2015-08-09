<?php

$title = "Accueil";
include('includes/header.php');

require_once __DIR__ . '/lib/Flash/class.Flash.php';
?>

<h1>Gestion portuaire<br><small>by Chicken Brothers</small></h1>


<div class="jumbotron text-center">
    <?php
        $errors = Flash::getErrors();
        foreach($errors as $error) {
            echo '<p style="color: red; font-size: 16px;">'.$error.'</p>';
        }
    ?>
	<p>Bienvenue sur le gestionnaire du trafic portuaire du Havre.</p>
	
	<p>Utilisez le menu en haut du site pour vous connecter ou vous inscrire.</p>
</div>

<?php

include('includes/footer.php');

?>
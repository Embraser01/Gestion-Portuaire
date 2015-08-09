<?php
$title = "Connexion";
include('includes/header.php');

require_once __DIR__ . '/lib/Flash/class.Flash.php';

?>
<div id="connexion">
    <div id="panel">
        <div class="wrap">
        <h2>Connexion</h2>
        <?php
            $errors = Flash::getErrors();
            foreach($errors as $error) {
                echo '<p style="color: red; font-size: 16px;">'.$error.'</p>';
            }
        ?>
        <form action="actions/connexion.php" method="post">
	        <input type="text" placeholder="Adresse e-mail" name="email" />
	        <input type="password" placeholder="Mot de passe" name="password" />
	        <div>
	        	<a id="new_account" href="inscription.php">Nouveau compte</a>
	        </div>
	        <div>
	        	<a id="forget_password" href="#">Mot de passe oublié</a>
	        </div>
	        <input type="submit" value="Se connecter" />
        </form>
        </div>
    </div>
</div>

<?php

include('includes/footer.php');

?>
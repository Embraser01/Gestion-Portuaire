<?php

session_start();

require_once __DIR__ . '/../lib/Flash/class.Flash.php';

 //Déconnexion
unset($_SESSION["email"]);
unset($_SESSION["personneTypeId"]);

Flash::error("Déconnecté avec succès.");
Flash::error("A bientôt !");

header('Location: ../index.php');

?>
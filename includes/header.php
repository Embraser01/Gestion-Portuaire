<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title><?php if(isset($title)) { echo $title.' | '; } ?>Chicken Brothers - Havre</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<!--<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
<?php
	include('menu.php');
?>
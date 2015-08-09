<nav class="navbar navbar-default navbar-fixed-top ">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Accueil</a>				
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if(!isset($_SESSION["email"])) { echo '<li><a href="connexion.php">Connexion</a></li>'; } ?>
				<?php if(!isset($_SESSION["email"])) { echo '<li><a href="inscription.php">Inscription</a></li>'; } ?>
				<?php if(isset($_SESSION["email"])) { echo '<li><a href="mon_compte.php">Mon compte</a></li>'; } ?>
				<?php if(isset($_SESSION["email"])) { echo '<li><a href="statistiques.php">Statistiques</a></li>'; } ?>
				<li><a href="a_propos.php">À propos</a></li>
			</ul>
			<?php if(isset($_SESSION["email"])) {
				echo '<ul class="nav navbar-nav navbar-right">';
				echo '<li><a href="actions/deconnexion.php" class="btn btn-danger">Deconnexion</a></li>'; 
				echo '</ul>';
			} ?>
		</div>
	</div>
</nav>
<div class="container">
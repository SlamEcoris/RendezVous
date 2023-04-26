<header>
		<nav>
			<img src="images/logo.png" alt="Logo entreprise">
			<div class="liens">
				<a href="client.php">Mon profil</a>
				<a href="client.php">Mes rendez-vous</a>
				<a href="priseRendezVous.php">Prendre un rendez-vous</a>
				<a href="deconnexion.php">Se déconnecter</a>
			</div>
		</nav>
		<?php 
			if (!isset($_SESSION["idCompte"])) {
				header("location: index.php");
			}
		?>
</header>
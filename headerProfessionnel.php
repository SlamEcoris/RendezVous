<header>
		<nav>
			<img src="images/logo.png" alt="Logo entreprise">
			<div class="liens">
				<a href="professionnel.php#profil">Mon profil</a>
				<a href="professionnel.php#entreprise">Mon entreprise</a>
				<a href="professionnel.php#rendezVous">Mes rendez-vous</a>
				<a href="deconnexion.php">Se déconnecter</a>
			</div>
		</nav>
		<?php 
			if (!isset($_SESSION["idCompte"])) {
				header("location: index.php");
			}
		?>
</header>
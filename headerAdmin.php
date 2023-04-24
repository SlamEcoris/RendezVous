<header>
		<nav>
			<img src="images/logo.png" alt="Logo entreprise">
			<div class="liens">
				<a href="admin.php">Mon profil</a>
				<a href="deconnexion.php">Se déconnecter</a>
			</div>
		</nav>
		<?php 
			if (!isset($_SESSION["idCompte"])) {
				header("location: index.php");
			}
		?>
</header>
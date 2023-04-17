<!doctype html>
<?php 
	require "modele/EntrepriseDb.php";
	session_start(); 
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Client - MonRendezVousPro</title>
		<link href="style.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	</head>
	<body>
	<?php include_once('headerClient.php'); ?>
	<main>
		<h1>Prendre rendez-vous</h1>
		<form method="post" action="rechercheProfessionnel.php" class="barre-recherche">
			<div class="champsRecherche">
				<input type="text" name="recherche" id="recherche" placeholder="Nom, activité, ..." class="champRecherche">
				<input type="text" name="lieux" id="lieux" placeholder="Ville ou code postal" class="champRecherche">
			</div>
			<div class="bouton">
				<input type="submit" value="Rechercher" class="cta">
			</div>
		</form>
		<h2 class="recherche-titre">Professionnels disponible :</h2>
		<div class="recherche">
			<?php 
			if ((isset($_SESSION["recherche"]) && !empty($_SESSION["recherche"])) || (isset($_SESSION["lieux"]) && !empty($_SESSION["lieux"])) ) {
				$resultats = $_SESSION["recherche"];
				foreach ($resultats as $resultat){
					?>
					<div class="la-recherche">
						<div class="recherche-detail">
							<img src="images/iconePersonne.png" alt="Icone représentant une personne" class="recherche-icone">
							<div class="recherche-detail-pro">
								<?php 
									echo $resultat['nom']." ".$resultat['prenom'];
								?>
								<div class="recherche-activite">
									<?php 
										$classeEntreprise = new EntrepriseDb();
										$entreprise = $classeEntreprise->getEntrepriseId($resultat['id']);
									?>
									<div>
										<?php echo $entreprise['activite']; ?>
									</div>
									<div>
										<?php echo $entreprise['codePostal']." ".$entreprise['ville']; ?>
									</div>
								</div>
							</div>
						</div>
						<div>
							<a href="rendezVousAvecLePro.php" class="cta-rendez-vous">Voir la prochaine disponibilité</a>
						</div>
					</div>
					<?php
				}
			}
			else {
				?>
				<div>
					Aucun professionnels ne correspond à votre recherche.
				</div>
				<?php
			}
			?>
		</div>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
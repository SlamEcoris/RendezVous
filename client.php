<!doctype html>
<?php	
	require "modele/ClientDb.php";
	require "modele/RendezVousDb.php";
	require "modele/EmployeDb.php";
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
        <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserra&display=swap" rel="stylesheet">
	</head>
	<body>
	<?php include_once('header.php'); ?>
	<?php
	$classeClient = new ClientDb();
	$client = $classeClient->getClient($_SESSION["idCompte"]);
	$_SESSION["idClient"] = $client["id"];

	$classeRendezVous = new RendezVousDB();
	$rendezVous = $classeRendezVous->getRendezVousIdClient($_SESSION["idClient"]);

	$classeEmploye = new EmployeDb();
	?>
	<main>
		<h1>Espace personnel</h1>
		<section class="contenu">
			<section class="infos-perso">
				<h2>Votre profil :</h2>
				<div class="liste-infos-perso">
					<div class="titre-info-client">
						Nom :
					</div>
					<div class="contenu-info-client">
						<?php echo $client['nom']; ?>
					</div>
					<div class="titre-info-client">
						Prénom :
					</div>
					<div class="contenu-info-client">
						<?php echo $client['prenom']; ?>
					</div>
					<div class="titre-info-client">
						Email :
					</div>
					<div class="contenu-info-client">
						<?php echo $client['mail']; ?>
					</div>
					<div class="titre-info-client">
						Téléphone :
					</div>
					<div class="contenu-info-client">
						<?php echo $client['telephone']; ?>
					</div>
				</div>
			</section>
			<section class="liste-rendez-vous">
				<h2>Vos rendez-vous :</h2>
				<div class="les-rendez-vous">
					<?php 
						foreach ($rendezVous as $cle => $valeur) {
							$employe = $classeEmploye->getEmployeId($rendezVous[$cle]["idEmploye"]);?>
							<div class="rendez-vous">
							<div class="rendez-vous-infos">
								<p class="rendez-vous-date-heure">
									<?php echo $rendezVous[$cle]['date'];?>
								</p>
								<h3 class="rendez-vous-pro">
									<?php echo $employe['nom'].' '.$employe['prenom']; ?>
								</h3>
								<p class="rendez-vous-profession">
									<?php echo $rendezVous[$cle]['objet'];?>
								</p>
							</div>
							<div>
								<a href="clientDetailRendezVous.php?idRendezVous=<?php echo $rendezVous[$cle]['id'] ?>">
									<img src="images/iconeDetail.png" alt="Icone pour accéder au détail"  class="rendez-vous-detail">
								</a>
							</div>
						</div><?php
						}
					?>
				</div>	
			</section>
		</section>
		<section class="les-boutons">
			<div class="bouton">
				<a href="clientModif.php" class="cta">
					Modifier votre profil
				</a>
			</div>
			<div class="bouton">
				<a href="priseRendezVous.php" class="cta">
					Prendre un rendez-vous
				</a>
			</div>
		</section>
	</main>
	<footer>

	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
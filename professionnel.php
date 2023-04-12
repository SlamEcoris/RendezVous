<!doctype html>
<?php	
	require "modele/EmployeDb.php";
	require "modele/RendezVousDb.php";
	require "modele/EntrepriseDb.php";
	require "modele/ClientDb.php";
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Professionnel - MonRendezVousPro</title>
		<link href="style.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserra&display=swap" rel="stylesheet">
	</head>
	<body>
	<?php include_once('header.php'); ?>
	<?php
	$classeEmploye = new EmployeDb();
	$employe = $classeEmploye->getEmployeId($_SESSION["idCompte"]);

	$classeRendezVous = new RendezVousDB();
	$rendezVous = $classeRendezVous->getRendezVousIdEmploye($_SESSION["idCompte"]);

	$classeEntreprise = new EntrepriseDb();
	$entreprise = $classeEntreprise->getEntrepriseId($employe["idEntreprise"]);

	$classeClient = new ClientDb();
	?>
	<main>
		<h1>Espace professionnel</h1>
		<section class="contenu">
			<section class="infos-perso">
				<h2>Votre profil :</h2>
				<div class="liste-infos-perso">
					<div class="titre-info-client">
						Nom :
					</div>
					<div class="contenu-info-client">
						<?php echo $employe['nom']; ?>
					</div>
					<div class="titre-info-client">
						Prénom :
					</div>
					<div class="contenu-info-client">
						<?php echo $employe['prenom']; ?>
					</div>
					<div class="titre-info-client">
						Email :
					</div>
					<div class="contenu-info-client">
						<?php echo $employe['mail']; ?>
					</div>
					<div class="titre-info-client">
						Téléphone :
					</div>
					<div class="contenu-info-client">
						<?php echo $employe['telephone']; ?>
					</div>
				</div>
				<h2 class="titreEntreprise">Votre entreprise :</h2>
				<div class="liste-infos-perso">
					<div class="titre-info-client">
						Activité :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['activite']; ?>
					</div>
					<div class="titre-info-client">
						Adresse :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['adresse1']; ?>
					</div>
					<div class="titre-info-client">
						Complément d'adresse :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['adresse2']; ?>
					</div>
					<div class="titre-info-client">
						Ville :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['ville']; ?>
					</div>
					<div class="titre-info-client">
						Code postal :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['codePostal']; ?>
					</div>
					<div class="titre-info-client">
						Raison sociale :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['raisonSociale']; ?>
					</div>
					<div class="titre-info-client">
						Présentation :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['presentation']; ?>
					</div>
				</div>
			</section>
			<section class="liste-rendez-vous">
				<h2>Vos rendez-vous :</h2>
				<div class="les-rendez-vous">
					<?php 
						foreach ($rendezVous as $cle => $valeur) {
							$client = $classeClient->getClientId($rendezVous[$cle]["idClient"]);?>
							<div class="rendez-vous">
							<div class="rendez-vous-infos">
								<p class="rendez-vous-date-heure">
									<?php echo $rendezVous[$cle]['date'];?>
								</p>
								<h3 class="rendez-vous-pro">
									<?php echo $client['nom'].' '.$client['prenom']; ?>
								</h3>
								<p class="rendez-vous-profession">
									<?php echo $rendezVous[$cle]['objet'];?>
								</p>
							</div>
							<div>
								<a href="professionnelDetailRendezVous.php?idRendezVous=<?php echo $rendezVous[$cle]['id'] ?>">
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
				<a href="professionnelModif.php" class="cta">
					Modifier votre profil
				</a>
			</div>
		</section>
	</main>
	<footer>

	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
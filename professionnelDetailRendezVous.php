<!doctype html>
<?php	
	require "modele/RendezVousDb.php";
	require "modele/ClientDb.php";
	require "modele/EmployeDb.php";
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
	<?php include_once('headerProfessionnel.php'); ?>
	<?php 
		$idRendezVous = $_GET["idRendezVous"];

		$classeRendezVous = new RendezVousDB();
		$rendezVous = $classeRendezVous->getRendezVousId($idRendezVous);

		$classeClient = new ClientDb();
		$client = $classeClient->getClientId($rendezVous['idClient']);

		$classeEmploye = new EmployeDb();
		$employe = $classeEmploye->getEmployeId($rendezVous['idEmploye']);

		$classeEntreprise = new EntrepriseDb();
		$entreprise = $classeEntreprise->getEntrepriseId($employe['idEntreprise']);
	?>
	<main>
		<h1>Détail du rendez vous</h1>
		<section class="detail">
			<div class="titre-detail">
				Objet du rendez-vous :
			</div>
			<div class="contenu-detail">
				<?php echo $rendezVous['objet']; ?>
			</div>
			<div class="titre-detail">
				Date :
			</div>
			<div class="contenu-detail">
				<?php echo $rendezVous['date']; ?>
			</div>
			<div class="titre-detail">
				Heure de début et de fin :
			</div>
			<div class="contenu-detail">
				<?php echo $rendezVous['heureDebut']." à ".$rendezVous['heureFin']; ?>
			</div>
			<div class="titre-detail">
				Client :
			</div>
			<div class="contenu-detail">
				<?php echo $client['nom']." ".$client['prenom']; ?>
			</div>
			<div class="titre-detail">
				Email :
			</div>
			<div class="contenu-detail">
				<?php echo $client['mail']; ?>
			</div>
			<div class="titre-detail">
				Téléphone :
			</div>
			<div class="contenu-detail">
				<?php echo $client['telephone']; ?>
			</div>
			<div class="titre-detail">
				Adresse :
			</div>
			<div class="contenu-detail">
				<?php echo $entreprise['adresse1']; ?>
			</div>
			<div class="titre-detail">
				Complément d'adresse :
			</div>
			<div class="contenu-detail">
				<?php echo $entreprise['adresse2']; ?>
			</div>
			<div class="titre-detail">
				Ville :
			</div>
			<div class="contenu-detail">
				<?php echo $entreprise['ville']." ".$entreprise['codePostal']; ?>
			</div>
		</section>
		<section class="les-boutons">
			<div class="bouton">
				<a href="professionnel.php" class="cta">
					Retour
				</a>
			</div>
			<div class="bouton">
				<a href="supprimeRendezVousProfessionnel.php?idRendezVous=<?php echo $idRendezVous ?>" class="cta">
					Supprimer
				</a>
			</div>
		</section>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
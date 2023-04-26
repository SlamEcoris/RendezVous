<!doctype html>
<?php	
	require "modele/EmployeDb.php";
	require "modele/RendezVousDb.php";
	require "modele/EntrepriseDb.php";
	require "modele/ClientDb.php";
	require "modele/HorairreDb.php";
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
	<?php include_once('headerProfessionnel.php'); ?>
	<?php
	$classeEmploye = new EmployeDb();
	$employe = $classeEmploye->getEmployeIdCompte($_SESSION["idCompte"]);
	$_SESSION["idEmploye"] = $employe["id"];

	$classeRendezVous = new RendezVousDB();
	$rendezVous = $classeRendezVous->getRendezVousIdEmploye($employe["id"]);
	
	$classeEntreprise = new EntrepriseDb();
	$entreprise = $classeEntreprise->getEntrepriseId($employe["idEntreprise"]);
	$_SESSION["idEntreprise"]=$employe["idEntreprise"];

	$classeClient = new ClientDb();

	$classeHorairre = new HorairreDb();
	$listeHoraire = $classeHorairre->getHorairre();
	$presenceHoraire=false;
	foreach ($listeHoraire as $cle=>$valeur){
		if ($listeHoraire[$cle]["idEntreprise"]==$_SESSION["idEntreprise"]){
			$presenceHoraire = true;
		}
	}
	if ($presenceHoraire == true) {
		$horairre = $classeHorairre->getHorairreIdEntreprise($_SESSION["idEntreprise"]);
	} else {
		$horairre = array();
	}
	?>
	<main>
		<h1>Espace professionnel</h1>
		<section class="contenu">
			<section class="infos-perso">
				<h2 id="profil">Mon profil :</h2>
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
				<h2 class="titreEntreprise" id="entreprise">Mon entreprise :</h2>
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
					<div class="contenu-info-client-presentation">
						<?php echo $entreprise['presentation']; ?>
					</div>
					<div class="titre-info-client">
						Durée par défaut d'un rendez-vous :
					</div>
					<div class="contenu-info-client">
						<?php echo $entreprise['dureCreneaux']; ?>
					</div>
				</div>
			</section>
			<section class="liste-rendez-vous">
				<h2 id="horaires">Mes horaires :</h2>
				<div class="horaires">
					<div class="horaires-jours">
						<?php
							if (!empty($horairre)){
								foreach ($horairre as $cle=>$valeur) {
									?>
									<div class="horaires-jour">
										<?php echo $horairre[$cle]["date"]." : "; ?> 
									</div>
									<?php
								}
							} else { ?>
								<div class="aucun-horaire">
									Vous n'avez pas d'horaires renseignés.
								</div>
								<?php
							}?>
					</div>
					<div class="horaires-plages">
						<?php
							foreach ($horairre as $cle=>$valeur) {
								if ($horairre[$cle]["heureDebAM"]=="00:00:00"){
									$horairre[$cle]["heureDebAM"]="";
								}
								if ($horairre[$cle]["heureFinAM"]=="00:00:00"){
									$horairre[$cle]["heureFinAM"]="";
								}
								if ($horairre[$cle]["heureDebPM"]=="00:00:00"){
									$horairre[$cle]["heureDebPM"]="";
								}
								if ($horairre[$cle]["heureFinPM"]=="00:00:00"){
									$horairre[$cle]["heureFinPM"]="";
								}?>
								<div class="horaires-plage">
									<?php 
									if ($horairre[$cle]["heureDebAM"]=="" && $horairre[$cle]["heureFinAM"]=="" && $horairre[$cle]["heureDebPM"]=="" && $horairre[$cle]["heureFinPM"]=="") {
										echo "Fermé";
									} 
									elseif ($horairre[$cle]["heureDebAM"]=="" && $horairre[$cle]["heureFinAM"]=="") {
										echo "Fermé, ".$horairre[$cle]["heureDebPM"]." - ".$horairre[$cle]["heureFinPM"];
									} 
									elseif ($horairre[$cle]["heureDebPM"]=="" && $horairre[$cle]["heureFinPM"]=="") {
										echo $horairre[$cle]["heureDebAM"]." - ".$horairre[$cle]["heureFinAM"].", Fermé";
									} 
									else {
										echo $horairre[$cle]["heureDebAM"]." - ".$horairre[$cle]["heureFinAM"].", ".$horairre[$cle]["heureDebPM"]." - ".$horairre[$cle]["heureFinPM"]; 
									}?> 
								</div>
								<?php
							}?>
					</div>
				</div>
				<div class="bouton">
					<?php
						if (!empty($horairre)) {
							?>
							<a href="horairreModif.php" class="cta">
								Modifier vos horaires
							</a>
							<?php
						} else {
							?>
							<a href="horairreModif.php" class="cta">
								Ajouter vos horaires
							</a>
							<?php
						} 
					?>						
				</div>
				<h2 id="rendezVous">Mes rendez-vous :</h2>
				<div class="les-rendez-vous">
					<?php 
					if ($rendezVous != null) {
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
					}
					else {
						?>
						<div class="aucun-rendez-vous">
							Vous n'avez aucun rendez-vous prochainement.
						</div>
						<?php
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
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
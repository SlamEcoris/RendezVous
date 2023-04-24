<!doctype html>
<?php 
	require "modele/EmployeDb.php";
	require "modele/EntrepriseDb.php";
	require "modele/HorairreDb.php";
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
		<h1>
			<?php
				$idEmploye = $_GET["idEmploye"];

				$classeEmploye = new EmployeDb();
				$employe = $classeEmploye->getEmployeId($idEmploye);

				echo ($employe["nom"]." ".$employe["prenom"]);
			?>
		</h1>

		<section class="detail-pro-rdv">
			<?php
				$classeEntreprise = new EntrepriseDb();
				$entreprise = $classeEntreprise->getEntrepriseId($employe["idEntreprise"]);

				$classeHorairre = new HorairreDb();
				$listeHoraire = $classeHorairre->getHorairre();
				$presenceHoraire=false;
				foreach ($listeHoraire as $cle=>$valeur){
					if ($listeHoraire[$cle]["idEntreprise"]==$employe["idEntreprise"]){
						$presenceHoraire = true;
					}
				}
				if ($presenceHoraire == true) {
					$horairre = $classeHorairre->getHorairreIdEntreprise($employe["idEntreprise"]);
				} else {
					$horairre = array();
				}
			?>
			<div class="le-pro-infos">
				<img src="images/iconePersonne.png" alt="icone personne" class="le-pro-image">
				<div class="le-pro-detail">
					<div class="le-pro-activite">
						<h3>Activité : </h3>
						<?php echo $entreprise["activite"]; ?>
					</div>
					<div class="le-pro-presentation">
						<h3>Présentation : </h3>
						<?php echo $entreprise["presentation"]; ?>
					</div>
				</div>
			</div>
			<div class="le-pro-temps">
				<div class="le-pro-horaire">
					<h3>Horaires : </h3>
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
										Aucun horaires renseignés.
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
				</div>
				<div class="le-pro-creneaux">
					<h3>Prochains créneaux : </h3>
				</div>
			</div>
		</section>
		<section class="les-boutons">
			<div class="bouton">
				<a href="priseRendezVous.php" class="cta">
					Retour
				</a>
			</div>
		</section>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
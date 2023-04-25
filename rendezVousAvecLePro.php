<!doctype html>
<?php 
	require "modele/EmployeDb.php";
	require "modele/EntrepriseDb.php";
	require "modele/HorairreDb.php";
	require "modele/RendezVousDb.php";
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

				$classeRendezVous = new RendezVousDB();
				$rendezVous = $classeRendezVous->getRendezVousIdEmploye($idEmploye);
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
					<div class="le-pro-creneaux-contenu">
						<?php 
							if (!empty($horairre)){
								foreach ($horairre as $cle=>$valeur) {
									if ($horairre[$cle]["heureDebAM"]!=="" && $horairre[$cle]["heureFinAM"]!=="" || $horairre[$cle]["heureDebPM"]!=="" && $horairre[$cle]["heureFinPM"]!=="") { ?>
										<div class="creneaux-le-jour">
											<?php 
												date_default_timezone_set('Europe/Paris');
												$date = date('Y-m-d H:i:s');
												if ($horairre[$cle]["date"]=="Lundi") {
													$prochainJour = date_create($date . ' Next Monday');
												}
												elseif ($horairre[$cle]["date"]=="Mardi") {
													$prochainJour = date_create($date . ' Next Tuesday');
												}
												elseif ($horairre[$cle]["date"]=="Mercredi") {
													$prochainJour = date_create($date . ' Next Wednesday');
												}
												elseif ($horairre[$cle]["date"]=="Jeudi") {
													$prochainJour = date_create($date . ' Next Thursday');
												}
												elseif ($horairre[$cle]["date"]=="Vendredi") {
													$prochainJour = date_create($date . ' Next Friday');
												}
												elseif ($horairre[$cle]["date"]=="Samedi") {
													$prochainJour = date_create($date . ' Next Saturday');
												}
												elseif ($horairre[$cle]["date"]=="Dimanche") {
													$prochainJour = date_create($date . ' Next Sunday');
												}
												
												if ($prochainJour->format('F')=="January") {
													$mois = "Janvier";
												}
												elseif ($prochainJour->format('F')=="February") {
													$mois = "Février";
												}
												elseif ($prochainJour->format('F')=="March") {
													$mois = "Mars";
												}
												elseif ($prochainJour->format('F')=="April") {
													$mois = "Avril";
												}
												elseif ($prochainJour->format('F')=="May") {
													$mois = "Mai";
												}
												elseif ($prochainJour->format('F')=="June") {
													$mois = "Juin";
												}
												elseif ($prochainJour->format('F')=="July") {
													$mois = "Juillet";
												}
												elseif ($prochainJour->format('F')=="August") {
													$mois = "Août";
												}
												elseif ($prochainJour->format('F')=="September") {
													$mois = "Septembre";
												}
												elseif ($prochainJour->format('F')=="October") {
													$mois = "Octobre";
												}
												elseif ($prochainJour->format('F')=="November") {
													$mois = "Novembre";
												}
												elseif ($prochainJour->format('F')=="December") {
													$mois = "Décembre";
												}

												$date=$horairre[$cle]["date"] . " " . $prochainJour->format('d') . " " . $mois;
												$annee = $prochainJour->format('Y');
												$dateComplete = $annee."-".$prochainJour->format('m')."-".$prochainJour->format('d');
												echo $date; ?> 
										</div>
										<?php
										$creneaux = $entreprise["dureCreneaux"];
										$creneauxDivise = explode(":", $creneaux);
										$creneauxHeure = $creneauxDivise[0];
										$creneauxMinute = $creneauxDivise[1];
										$creneauxSeconde = $creneauxDivise[2];
										?>
										<div class="creneaux-matin">
											<?php
											if($horairre[$cle]["heureDebAM"]!=="" && $horairre[$cle]["heureFinAM"]!=="") {
												$debutCreneaux = new DateTimeImmutable($horairre[$cle]["heureDebAM"]);
												$finCreneaux = new DateTimeImmutable($horairre[$cle]["heureDebAM"]);
												$fermetureMatin = new DateTimeImmutable($horairre[$cle]["heureFinAM"]);
												while ($debutCreneaux<$fermetureMatin) {
													$finCreneaux = $finCreneaux->add(new DateInterval('PT'.$creneauxHeure.'H'.$creneauxMinute.'M'.$creneauxSeconde.'S'));
													$creneauxDispo = count($rendezVous);
													foreach ($rendezVous as $keyOne => $valeur){
														if ($rendezVous[$keyOne]["date"]==$dateComplete && $rendezVous[$keyOne]['heureDebut']==$debutCreneaux->format('H:i:s') && $rendezVous[$keyOne]['heureFin']==$finCreneaux->format('H:i:s')) {
															$creneauxDispo = $creneauxDispo-1;
														}
													}
													if ($creneauxDispo==count($rendezVous)){
														?>
														<div class="le-creneau">
															<a href="validationRendezVous.php?idEmploye=<?php echo $idEmploye ?>&&dateRdv=<?php echo $date ?>&&heureDebut=<?php echo $debutCreneaux->format('H:i') ?>&&heureFin=<?php echo $finCreneaux->format('H:i') ?>&&annee=<?php echo $annee ?>" class="le-rendez-vous-validation">
																<?php echo $debutCreneaux->format('H:i') . " - " . $finCreneaux->format('H:i'); ?>
															</a>
														</div>
														<?php
													}

													$debutCreneaux = $debutCreneaux->add(new DateInterval('PT'.$creneauxHeure.'H'.$creneauxMinute.'M'.$creneauxSeconde.'S'));
												}
											}
											?>
										</div>
										<div class="creneaux-aprem">
											<?php
											if($horairre[$cle]["heureDebPM"]!=="" && $horairre[$cle]["heureFinPM"]!=="") {
												$debutCreneaux = new DateTimeImmutable($horairre[$cle]["heureDebPM"]);
												$finCreneaux = new DateTimeImmutable($horairre[$cle]["heureDebPM"]);
												$fermetureAprem = new DateTimeImmutable($horairre[$cle]["heureFinPM"]);

												while ($debutCreneaux<$fermetureAprem) {
													$finCreneaux = $finCreneaux->add(new DateInterval('PT'.$creneauxHeure.'H'.$creneauxMinute.'M'.$creneauxSeconde.'S'));
													$creneauxDispo = count($rendezVous);
													foreach ($rendezVous as $keyTwo => $valeur){
														if ($rendezVous[$keyTwo]["date"]==$dateComplete && $rendezVous[$keyTwo]['heureDebut']==$debutCreneaux->format('H:i:s') && $rendezVous[$keyTwo]['heureFin']==$finCreneaux->format('H:i:s')) {
															$creneauxDispo = $creneauxDispo-1;
														}
													}
													if ($creneauxDispo==count($rendezVous)) {
														?>
														<div class="le-creneau">
															<a href="validationRendezVous.php?idEmploye=<?php echo $idEmploye ?>&&dateRdv=<?php echo $date ?>&&heureDebut=<?php echo $debutCreneaux->format('H:i') ?>&&heureFin=<?php echo $finCreneaux->format('H:i') ?>&&annee=<?php echo $annee ?>" class="le-rendez-vous-validation">
																<?php echo $debutCreneaux->format('H:i') . " - " . $finCreneaux->format('H:i'); ?>
															</a>
														</div>
														<?php
													}
													$debutCreneaux = $debutCreneaux->add(new DateInterval('PT'.$creneauxHeure.'H'.$creneauxMinute.'M'.$creneauxSeconde.'S'));
												}
											}
											?>
										</div>
										<?php
									}
								}
							} else { ?>
								<div class="aucun-creneaux">
									Le professionnel n'a pas renseigné ces horaires, il n'est donc pas possible d'avoir de rendez-vous avec lui.
								</div>
								<?php
							}
						?>
					</div>
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
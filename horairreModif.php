<!doctype html>
<?php
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
        <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">
	</head>
	<body>
	<?php include_once('headerProfessionnel.php'); ?>
	<?php
    $classeHorairre = new HorairreDb();
	$listeHoraire = $classeHorairre->getHorairre();
	$presenceHoraire=false;
	foreach ($listeHoraire as $cle=>$valeur){
		if ($listeHoraire[$cle]["idEntreprise"]==$_SESSION["idEntreprise"]){
			$presenceHoraire = true;
		}
	}
	?>
	<main>
        <?php 
            if ($presenceHoraire==true) {
                ?> <h1>Modification de mes horaires</h1> <?php
            } else {
                ?> <h1>Ajout de mes horaires</h1> <?php
            }
        ?>
		<section class="horaire-modif">
			<section class="infos-perso">
				<form method="post" action="memoriseHoraires.php" class="liste-infos-perso">
                    <div class="titre-horaire">
                        Lundi : 
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Lundi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="lundiHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="lundiHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="lundiHeureDebAM" id="lundiHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="lundiHeureDebPM" id="lundiHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="lundiHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="lundiHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="lundiHeureFinAM" id="lundiHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="lundiHeureFinPM" id="lundiHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div>  
                    
                    <div class="titre-horaire">
                        Mardi :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Mardi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="mardiHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="mardiHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="mardiHeureDebAM" id="mardiHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="mardiHeureDebPM" id="mardiHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="mardiHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="mardiHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="mardiHeureFinAM" id="mardiHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="mardiHeureFinPM" id="mardiHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div>       
                    
                    <div class="titre-horaire">
                        Mercredi :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Mercredi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="mercrediHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="mercrediHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="mercrediHeureDebAM" id="mercrediHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="mercrediHeureDebPM" id="mercrediHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="mercrediHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="mercrediHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="mercrediHeureFinAM" id="mercrediHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="mercrediHeureFinPM" id="mercrediHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div> 

                    <div class="titre-horaire">
                        Jeudi :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Jeudi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="jeudiHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="jeudiHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="jeudiHeureDebAM" id="jeudiHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="jeudiHeureDebPM" id="jeudiHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="jeudiHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="jeudiHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="jeudiHeureFinAM" id="jeudiHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="jeudiHeureFinPM" id="jeudiHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div> 

                    <div class="titre-horaire">
                        Vendredi :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Vendredi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="vendrediHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="vendrediHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="vendrediHeureDebAM" id="vendrediHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="vendrediHeureDebPM" id="vendrediHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="vendrediHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="vendrediHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="vendrediHeureFinAM" id="vendrediHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="vendrediHeureFinPM" id="vendrediHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div>  

                    <div class="titre-horaire">
                        Samedi :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Samedi");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="samediHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="samediHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="samediHeureDebAM" id="samediHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="samediHeureDebPM" id="samediHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="samediHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="samediHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="samediHeureFinAM" id="samediHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="samediHeureFinPM" id="samediHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div>  

                    <div class="titre-horaire">
                        Dimanche :  
                        <?php
                            $classeHoraire = new HorairreDb();
                            $horaire = $classeHoraire->getHorairreIdEntrepriseAndDate($_SESSION["idEntreprise"], "Dimanche");
                            if (!empty($horaire)) {
                                if ($horaire["heureDebAM"]=="00:00:00"){
                                    $horaire["heureDebAM"]="";
                                }
                                if ($horaire["heureDebPM"]=="00:00:00"){
                                    $horaire["heureDebPM"]="";
                                }
                                if ($horaire["heureFinAM"]=="00:00:00"){
                                    $horaire["heureFinAM"]="";
                                }
                                if ($horaire["heureFinPM"]=="00:00:00"){
                                    $horaire["heureFinPM"]="";
                                }
                            }
                        ?>
                    </div>
                    <div class="modif-horaires">
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="dimancheHeureDebAM" class="titre-detail-horaire">
                                    Horaire d'ouverture matin :
                                </label>
                                <label for="dimancheHeureDebPM" class="titre-detail-horaire">
                                    Horaire d'ouverture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="dimancheHeureDebAM" id="dimancheHeureDebAM" class="contenu-horaire" value="<?php echo $horaire["heureDebAM"]; ?>">
                                <input type="time" name="dimancheHeureDebPM" id="dimancheHeureDebPM" class="contenu-horaire" value="<?php echo $horaire["heureDebPM"]; ?>">
                            </div>
                        </div>
                        <div class="modif-horaire">
                            <div class="modif-detail">
                                <label for="dimancheHeureFinAM" class="titre-detail-horaire">
                                    Horaire de fermeture matin :
                                </label>
                                <label for="dimancheHeureFinPM" class="titre-detail-horaire">
                                    Horaire de fermeture après-midi :
                                </label>
                            </div>
                            <div class="modif-detail-horaire">
                                <input type="time" name="dimancheHeureFinAM" id="dimancheHeureFinAM" class="contenu-horaire" value="<?php echo $horaire["heureFinAM"]; ?>">
                                <input type="time" name="dimancheHeureFinPM" id="dimancheHeureFinPM" class="contenu-horaire" value="<?php echo $horaire["heureFinPM"]; ?>">
                            </div>
                        </div>
                    </div>  

                    <div class="boutons">
						<div class="bouton">
							<input type="submit" value="Enregistrer" class="cta">
						</div>
						<div class="bouton">
							<a href="professionnel.php" class="cta">
								Annuler
							</a>
						</div>
					</div>	
				</form>
			</section>
		</section>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
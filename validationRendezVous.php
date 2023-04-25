<!doctype html>
<?php	
	require "modele/EmployeDb.php";
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
	<?php include_once('headerClient.php'); ?>
    <?php 
        $idEmploye = $_GET["idEmploye"];
        $dateRdv = $_GET["dateRdv"];
        $heureDebut = $_GET["heureDebut"];
        $heureFin = $_GET["heureFin"];
        $annee = $_GET["annee"];

        $classeEmploye = new EmployeDb();
		$employe = $classeEmploye->getEmployeId($idEmploye);
    ?>
	<main>
		<h1>Confirmation du rendez-vous</h1>
		<section class="contenu-modif">
            <div class="infos-perso">
                <form method="post" action="memoriseRendezVous.php" class="liste-infos-perso">
                    <div class="titre-info-client">
                        Rendez-vous avec :
                    </div>
                    <div class="contenu-info-client">
                        <?php echo ($employe["nom"]." ".$employe["prenom"]); ?>
                    </div>
                    <input type="text" name="idEmploye" id="idEmploye" class="invisible" value="<?php echo $idEmploye; ?>">
                    <div class="titre-info-client">
                        Le :
                    </div>
                    <div class="contenu-info-client">
                        <?php echo $dateRdv; ?>
                    </div>
                    <input type="text" name="dateRdv" id="dateRdv" class="invisible" value="<?php echo $dateRdv; ?>">
                    <input type="text" name="annee" id="annee" class="invisible" value="<?php echo $annee; ?>">
                    <div class="titre-info-client">
                        De :
                    </div>
                    <div class="contenu-info-client">
                        <?php echo $heureDebut; ?>
                    </div>
                    <input type="time" name="heureDebut" id="heureDebut" class="invisible" value="<?php echo $heureDebut; ?>">
                    <div class="titre-info-client">
                        A :
                    </div>
                    <div class="contenu-info-client">
                        <?php echo $heureFin; ?>
                    </div>
                    <input type="time" name="heureFin" id="heureFin" class="invisible" value="<?php echo $heureFin; ?>">
					<label for="objet" class="titre-info-client">
						Objet : 
					</label>
					<input type="text" name="objet" id="objet" class="contenu-info-client" placeholder="Saisir l'objet du rendez-vous">
                    <div class="les-boutons">
                        <div class="bouton">
                        <a href="rendezVousAvecLePro.php?idEmploye=<?php echo $idEmploye ?>" class="cta">
                            Annuler
                        </a> 
                        </div>
                        <div class="bouton">
                            <input type="submit" value="Valider" class="cta">
                        </div>
                    </div>
                </form>
            </div>
        </section>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
<?php session_start(); ?>
<!doctype html>
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
		<form method="post" action="rechercheProfessionnel.php" class="recherche">
			<div class="champsRecherche">
				<input type="text" name="recherche" id="recherche" placeholder="Nom, activité, ..." class="champRecherche">
				<input type="text" name="lieux" id="lieux" placeholder="Ville ou code postal" class="champRecherche">
			</div>
			<div class="bouton">
				<input type="submit" value="Rechercher" class="cta">
			</div>
		</form>
		<h2>Professionnels disponible :</h2>
		<?php 
		if ( isset($_SESSION["recherche"]) && !empty(($_SESSION["recherche"]))) {
			$resultats = $_SESSION["recherche"];
			foreach ($resultats as $resultat){
				echo $resultat['nom']." ".$resultat['prenom']."<br>";
			}
		}
		?>
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
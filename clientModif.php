<!doctype html>
<?php
	require "modele/ClientDb.php";
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
	<?php
	$classeClient = new ClientDb();
	$client = $classeClient->getClient($_SESSION["idCompte"]);
	?>
	<main>
		<h1>Modification de mon profil</h1>
		<section class="contenu-modif">
			<section class="infos-perso">
				<h2>Votre profil :</h2>
				<form method="post" action="memoriseClient.php" class="liste-infos-perso">
					<label for="nom" class="titre-info-client">
						Nom :
					</label>
					<input type="text" name="nom" id="nom" class="contenu-info-client" value="<?php echo $client['nom']; ?>">
					<label for="prenom" class="titre-info-client">
						Prénom :
					</label>
					<input type="text" name="prenom" id="prenom" class="contenu-info-client" value="<?php echo $client['prenom']; ?>">
					<label for="email" class="titre-info-client">
						Email :
					</label>
					<input type="email" name="email" id="email" class="contenu-info-client" value="<?php echo $client['mail']; ?>">
					<label for="tel" class="titre-info-client">
						Téléphone :
					</label>
					<input type="tel" name="tel" id="tel" class="contenu-info-client" value="<?php echo $client['telephone']; ?>">
					<div class="boutons">
						<div class="bouton">
							<input type="submit" value="Enregistrer" class="cta">
						</div>
						<div class="bouton">
							<a href="client.php" class="cta">
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
<!doctype html>
<?php
	require "modele/EmployeDb.php";
	require "modele/EntrepriseDb.php";
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
	<?php include_once('header.php'); ?>
	<?php
	$classeEmploye = new EmployeDb();
	$employe = $classeEmploye->getEmployeId($_SESSION["idCompte"]);

	$classeEntreprise = new EntrepriseDb();
	$entreprise = $classeEntreprise->getEntrepriseId($employe["idEntreprise"]);
	?>
	<main>
		<h1>Modification de mon profil</h1>
		<section class="contenu-modif">
			<section class="infos-perso">
				<form method="post" action="memoriseProfessionnel.php" class="liste-infos-perso">
					<h2>Votre profil :</h2>
					<label for="nom" class="titre-info-client">
						Nom
                    </label>
					<input type="text" name="nom" id="nom" class="contenu-info-client" value="<?php echo $employe['nom']; ?>">
					<label for="prenom" class="titre-info-client">
						Prénom :
                    </label>
					<input type="text" name="prenom" id="prenom" class="contenu-info-client" value="<?php echo $employe['prenom']; ?>">
					<label for="email" class="titre-info-client">
						Email :
					</label>
					<input type="email" name="email" id="email" class="contenu-info-client" value="<?php echo $employe['mail']; ?>">
					<label for="tel" class="titre-info-client">
						Téléphone :
                    </label>
				    <input type="tel" name="tel" id="tel" class="contenu-info-client" value="<?php echo $employe['telephone']; ?>">
					<h2 class="titreEntreprise">Votre entreprise :</h2>
					<label for="activite" class="titre-info-client">
						Activité :
					</label>
					<input type="text" name="activite" id="activite" class="contenu-info-client" value="<?php echo $entreprise['activite']; ?>">
					<label for="adresse1" class="titre-info-client">
						Adresse :
					</label>
					<input type="text" name="adresse1" id="adresse1" class="contenu-info-client" value="<?php echo $entreprise['adresse1']; ?>">
					<label for="adresse2" class="titre-info-client">
						Complément d'adresse :
					</label>
					<input type="text" name="adresse2" id="adresse2" class="contenu-info-client" value="<?php echo $entreprise['adresse2']; ?>">
					<label for="ville" class="titre-info-client">
						Ville :
					</label>
					<input type="text" name="ville" id="ville" class="contenu-info-client" value="<?php echo $entreprise['ville']; ?>">
					<label for="codePostal" class="titre-info-client">
						Code postal :
					</label>
					<input type="text" name="codePostal" id="codePostal" class="contenu-info-client" value="<?php echo $entreprise['codePostal']; ?>">
					<label for="raisonSociale" class="titre-info-client">
						Raison sociale :
					</label>
					<input type="text" name="raisonSociale" id="raisonSociale" class="contenu-info-client" value="<?php echo $entreprise['raisonSociale']; ?>">
					<label for="presentation" class="titre-info-client">
						Présentation :
					</label>
					<input type="text" name="presentation" id="presentation" class="contenu-info-client" value="<?php echo $entreprise['presentation']; ?>">
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
	<footer>

	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
<!doctype html>
<?php 
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Accueil - MonRendezVousPro</title>
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<?php include_once('header.php'); ?>
	<main>
        <h1>Créer votre compte client</h1>
		<section class="contenu-modif">
			<section class="infos-perso">
				<?php
					$preRemplissage=array();
					if (isset($_SESSION["preCreationCompte"])) {
						$preRemplissage=$_SESSION["preCreationCompte"];
					}
				?>
				<form method="post" action="creationClient.php" class="liste-infos-perso">
					<label for="nom" class="titre-info-client">
						Nom :
					</label>
					<input type="text" name="nom" id="nom" class="contenu-info-client" placeholder="Votre nom" autofocus required value="<?php if (isset($preRemplissage["preNom"])) {echo $preRemplissage["preNom"];} ?>">
					
					<label for="prenom" class="titre-info-client">
						Prénom :
					</label>
					<input type="text" name="prenom" id="prenom" class="contenu-info-client" placeholder="Votre prénom" required value="<?php if (isset($preRemplissage["prePrenom"])) {echo $preRemplissage["prePrenom"];} ?>">
					
					<label for="email" class="titre-info-client">
						Email :
					</label>
					<input type="email" name="email" id="email" class="contenu-info-client" placeholder="Votre email" required value="<?php if (isset($preRemplissage["preMail"])) {echo $preRemplissage["preMail"];} ?>">
					
					<label for="tel" class="titre-info-client">
                        Téléphone :
					</label>
					<input type="tel" name="tel" id="tel" class="contenu-info-client" placeholder="Votre téléphone" required value="<?php if (isset($preRemplissage["preTel"])) {echo $preRemplissage["preTel"];} ?>">
                    
					<label for="identifiant" class="titre-info-client">
                        Identifiant :
					</label>
					<input type="text" name="identifiant" id="identifiant" class="contenu-info-client" placeholder="Choisissez un identifiant" required value="<?php if (isset($preRemplissage["preIdentifiant"])) {echo $preRemplissage["preIdentifiant"];} ?>">
                    
					<label for="mdp" class="titre-info-client">
                        Mot de passe :
					</label>
					<input type="password" name="mdp" id="mdp" class="contenu-info-client" placeholder="Choisissez un mot de passe" required>
                    
					<label for="confirmMdp" class="titre-info-client">
                        Confirmation mot de passe :
					</label>
					<input type="password" name="confirmMdp" id="confirmMdp" class="contenu-info-client" placeholder="Confirmer votre mot de passe" required>

					<div class="boutons">
						<div class="bouton">
							<input type="submit" value="Créer mon compte" class="cta">
						</div>
						<div class="bouton">
							<a href="index.php" class="cta">
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

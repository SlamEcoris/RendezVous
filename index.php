<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Accueil - MonRendezVousPro</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row text-center">
				<h1>Prenez rendez-vous avec un professionnel.</h1>
			</div>	
			<div class="row align-items-center">
				<div class="col-8">
					<div class="form-text">
						Bienvenue sur MonRendezVousPro. 
						Ici, vous pouvez retrouver différents professionnels (médecins, photographes, professeurs particuliers, ...) 
						et prendre rendez-vous avec eux.<br>
						Pour cela, recherchez le professionnel avec qui vous souhaitez prendre rendez-vous près de chez vous.<br>
						Vous pourrez retrouver tous vos rendez-vous à venir et passés dans votre compte, modifier ou annuler ceux-ci, 
						ainsi que contacter le professionnel avec qui vous avez rendez-vous.
					</div>
					<div class="row">
						<img alt="" src="images/ImageAccueil.png"/>
					</div>
				</div>
				<div class="col text-center" >
					<form method="post" action="verif.php">
						<div class="row">
							<h2>Connexion</h2>
						</div>
						<div class="row">
							<input type="text" name="ident" id="identifiant" class="form-control" placeholder="Identifiant">
						</div>
						<div class="row">
							<input type="password" name="mdp" id="motDePasse" class="form-control" placeholder="Mot de passe" />
						</div><br>
						<input type="submit" class="btn btn-primary" value="Se connecter">
						<a href="#" role="button" class="btn btn-primary">Créer un compte</a>
					</form>
					
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>

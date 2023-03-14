<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Accueil</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row text-center">
				<h1>Le titre à choisir</h1>
			</div>	
			<div class="row align-items-center">
				<div class="col-8">
					<div class="form-text">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum suscipit est, vitae mattis mauris tincidunt ut. Integer feugiat nisi ac odio mattis, sit amet interdum eros eleifend. 
						Maecenas viverra ultrices lectus, sit amet mattis eros elementum ac. Maecenas elit metus, sollicitudin vitae ex non, tristique interdum magna. Duis tincidunt dui ligula, ut suscipit tellus congue quis. 
						Quisque vitae nunc non est consequat feugiat. Vivamus euismod velit consequat erat vestibulum, vel egestas massa hendrerit. Morbi quis nibh elit. Cras nisl justo, hendrerit id convallis nec, dictum sit amet augue. 
						Vivamus egestas facilisis quam faucibus faucibus.<br>

						Morbi dictum bibendum pharetra. Sed ornare feugiat nulla vitae pharetra. Curabitur hendrerit egestas quam finibus ullamcorper. Nunc ut metus leo. Sed blandit arcu a augue tincidunt ornare.
						Ut a pretium nisl, non ullamcorper urna. Vivamus sit amet turpis nec ligula rhoncus iaculis. Praesent fermentum convallis massa a ultricies. 
					</div>
					<div class="row">
						<img alt="" src="images/Capture.png"/>
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
<!--		<form method="post" action="verif.php">
			<p>
				<label for="id_nom">Votre identifiant</label>
				<input type="text" name="nom" id="id_nom"/>
			</p> 
			<p>
				<label for="id_pass">Votre mot de passe :</label>
				<input type="password" name="pass" id="id_pass" />
			</p> 
			<p>
				<input type="submit" value="Valider" />
			</p>-->
<?php 
//		if (SESSION['erreur'] != NULL) {
//			echo '<p> '.SESSION['erreur'];
//		}
		?>
		</form>			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>

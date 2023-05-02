<!doctype html>
<?php 
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
	<?php include_once('header.php'); ?>
	<main>
		<h1>Créer un compte professionnel</h1>
        <div class="infos-creation-compte-pro">
            Pour créer votre compte professionnel, vous devez envoyer un mail à l'adresse : 
            <span class="mail">monrendezvouspro@gmail.com</span> en fournissant les informations suivantes :
                <ul>
                    <li>Votre extrait KBis,</li>
                    <li>Votre nom,</li>
                    <li>Votre prénom,</li>
                    <li>Votre email,</li>
                    <li>Votre téléphone,</li>
                    <li>L'activité que vous exercé,</li>
                    <li>L'adresse avec ville et code postal de votre entreprise,</li>
                    <li>La raison sociale de votre entreprise,</li>
                </ul>
        </div>
		
	</main>
	<?php include_once('footer.php'); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	</body>
</html>
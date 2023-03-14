<?php
require "modele/CompteDb.php";

$classCompte = new CompteDb();
$ident = $_POST["ident"];
$mdp = $_POST["mdp"];
$compte = $classCompte->getCompte($ident, $mdp);
if ($compte["droit"] == null) {
	//ouverture page 
	header ('Location: index.php');
}elseif ($compte["droit"] == 1 ) {
	//ouverture page admin
	header ('Location: admin.php');
} elseif ($compte["droit"] == 2 ) {
	//ouverture page professionnel
//	header ('Location : professionnel.php');
} elseif ($compte["droit"] == 3 ) {
	//ouverture page client
//	header ('Location : client.php');
} else {
	//retour page accueil
//	header ('Location: index.php');
}
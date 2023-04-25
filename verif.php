<?php
require "modele/CompteDb.php";
session_start();

$classCompte = new CompteDb();
$ident = $_POST["ident"];
$mdp = $_POST["mdp"];
$compte = $classCompte->getCompte($ident, $mdp);
$_SESSION["droit"] = $compte["droit"];
$_SESSION["idCompte"] = $compte["id"];
if ($compte["droit"] == null) {
	//ouverture page 
	header ('Location: index.php');
} elseif ($compte["droit"] == 2 ) {
	//ouverture page professionnel
	header ('Location: professionnel.php');
} elseif ($compte["droit"] == 3 ) {
	//ouverture page client
	header ('Location: client.php');
} else {
	//retour page accueil
	header ('Location: index.php');
}
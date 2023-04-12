<?php	
	require "modele/RechercheDb.php";
	session_start();
    
    $recherche = $_POST['recherche'];
    $classeRecherche = new RechercheDb();
    $rechercheResultat = $classeRecherche->getRecherchePros($recherche, $recherche, $recherche, $recherche);
    $_SESSION["recherche"] = $rechercheResultat;
    header ("location : priseRendezVous.php");

?>
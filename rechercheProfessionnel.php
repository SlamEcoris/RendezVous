<?php	
	require "modele/RechercheDb.php";
	session_start();
    
    if (!empty($_POST['recherche']) && !empty($_POST['lieux'])) {
        $recherche = $_POST['recherche'];
        $ville = $_POST['lieux'];
        $classeRecherche = new RechercheDb();
        $rechercheResultat = $classeRecherche->getRecherchePros($recherche, $ville);
    }
    elseif (!empty($_POST['recherche'])) {
        $recherche = $_POST['recherche'];
        $classeRecherche = new RechercheDb();
        $rechercheResultat = $classeRecherche->getRecherchePros($recherche);
    }
    elseif  (!empty($_POST['lieux'])) {
        $ville = $_POST['lieux'];
        $classeRecherche = new RechercheDb();
        $rechercheResultat = $classeRecherche->getRechercheVille($ville);
    }
    $_SESSION["recherche"] = $rechercheResultat;
    header ("location: priseRendezVous.php");
?>
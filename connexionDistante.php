<?php
require_once "jsonGeneration.php";

//Récupère le premier paramètre 
if (isset($_GET['fonc'])) {
    $fonction = $_GET['fonc'];
    if ($fonction == 1) {
        //infos sur rdv client second paramètre idClient
        if (isset($_GET['inf1'])) {
            $inf1 = $_GET['inf1'];
            $json = rdvClient($inf1);
            echo $json;
            return $json;
        }
    }
    else if ($fonction == 2) {
        //infos détail rdv idRendez-vous 
        if (isset($_GET['inf1'])) {
            $inf1 = $_GET['inf1'];
            $json = detailRdv($inf1);
            echo $json;
            return $json;
        }
    }
    else if ($fonction == 3) {
        //connexion distante
        if (isset($_GET['inf1']) && isset($_GET['inf2'])) {
            $mdp = $_GET['inf1'];
            $ident = $_GET['inf2'];
            $json = connexionCompte($ident, $mdp);
            echo $json;
            return $json;
        }       
    }
}
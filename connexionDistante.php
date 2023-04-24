<?php
require_once "modele/CompteDb.php";
//Récupère identifiant et le mot de passe
$classCompte = new CompteDb();

if (isset($_GET['inf1']) && isset($_GET['inf2'])) {
    $mdp = $_GET['inf1'];
    $ident = $_GET['inf2'];
    $compte = $classCompte->getCompte($ident, $mdp);
    if ($compte["id"] != null){
        echo $compte["id"];
    } else {
        echo $mdp."pas bon".$ident;
    }
}
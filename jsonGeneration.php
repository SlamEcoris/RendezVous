<?php 
require_once 'modele/RendezVousDb.php';
require_once "modele/CompteDb.php";

//liste rendez-vous client
function rdvClient($idClient) {
    $classRdv = new RendezVousDb();
    try {
        $listeRdv = $classRdv->getRendezVousIdClient($idClient);  
        $json = json_encode($listeRdv);
    } catch (Exception $e) {
        $json = "";
    }
    return $json;
}
//information concernant un rendez-vous
function detailRdv($idRendezVous)
{
    $classRdv = new RendezVousDb();
    //a faire: récupérer des informations sur un employe
    //nom prenom, fonction(pas dans la base), téléphone
    //et sur détail rendez-vous adresse, code postal et ville
    try {
        $detailRdv = $classRdv->getRendezVousId($idRendezVous);
        $json = json_encode($detailRdv);
    } catch (Exception $e) {
        $json = "";
    }
    return $json;
}

//id compte connecté à distance
function connexionCompte($ident, $mdp){
$classCompte = new CompteDb();
    $compte = $classCompte->getCompte($ident, $mdp);
    if ($compte["id"] != null){
        $json = json_encode($compte);
    } else { 
        $json = 0;
    }
    return $json;
}
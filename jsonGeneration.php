<?php 
require_once 'modele/RendezVousDb.php';
require_once 'modele/EmployeDb.php';
require_once 'modele/EntrepriseDb.php';

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

//information de l'employe en fonction de son id
function rendezVousDetail($idEmploye) {
    $classEntre = new RendezVousDb();
    try {
        $detail = $classEntre->getRendezVousDetail($idEmploye);
        $json = json_encode($detail);
    } catch (Exception $e) {
        $json = "";
    }
    return $json;
}

//récupération 
//Premier paramètre: "type" requête 1: liste rdv d'un client 2: information complète de l'employé
//Si "type" = 1 second paramètre "id": id client
//Si "type" = 2 second paramètre "id": id employe
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];

if ($type == 1) {
    echo rdvClient($id);
} else if ($type == 2) {
    echo rendezVousDetail($id);
}

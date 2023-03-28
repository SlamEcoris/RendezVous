<?php 
require_once 'modele/RendezVousDb.php';
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
//récupère l'id passer en paramètre
if (isset($_GET['']))
var_dump(rdvClient(2));
<?php 
require "modele/RendezVousDb.php";
session_start();

$dateRdv = $_POST["dateRdv"];
$annee = $_POST["annee"];

$dateDivise = explode(" ", $dateRdv);
if ($dateDivise[2]=="Janvier") {
    $dateDivise[2] = "January";
}
elseif ($dateDivise[2]=="Février") {
    $dateDivise[2] = "February";
}
elseif ($dateDivise[2]=="Mars") {
    $dateDivise[2] = "March";
}
elseif ($dateDivise[2]=="Avril") {
    $dateDivise[2] = "April";
}
elseif ($dateDivise[2]=="Mai") {
    $dateDivise[2] = "May";
}
elseif ($dateDivise[2]=="Juin") {
    $dateDivise[2] = "June";
}
elseif ($dateDivise[2]=="Juillet") {
    $dateDivise[2] = "July";
}
elseif ($dateDivise[2]=="Août") {
    $dateDivise[2] = "August";
}
elseif ($dateDivise[2]=="Septembre") {
    $dateDivise[2] = "September";
}
elseif ($dateDivise[2]=="Octobre") {
    $dateDivise[2] = "October";
}
elseif ($dateDivise[2]=="Novembre") {
    $dateDivise[2] = "November";
}
elseif ($dateDivise[2]=="Décembre") {
    $dateDivise[2] = "December";
}
$date = $dateDivise[1]."-".$dateDivise[2]."-".$annee;
$date = DateTimeImmutable::createFromFormat('d-F-Y', $date);
$date = $date->format('Y-m-d');

$classeRendezVous = new RendezVousDb();
$classeRendezVous->ajoutRendezVous($date, $_POST["heureDebut"], $_POST["heureFin"], $_POST["objet"], $_SESSION["idClient"], $_POST["idEmploye"] );
header ("location: client.php");
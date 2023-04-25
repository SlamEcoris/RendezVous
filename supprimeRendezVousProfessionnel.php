<?php
require "modele/RendezVousDb.php";
session_start();
// mémorisation suite à une modification d'un client
$idRendezVous = $_GET["idRendezVous"];
$classeRendezVous = new RendezVousDb();
$classeRendezVous->deleteRendezVousId($idRendezVous);
header ("location: professionnel.php");
<?php
require "modele/EmployeDb.php";
require "modele/EntrepriseDb.php";
session_start();
// mémorisation suite à une modification d'un professionnel
$classeEmploye = new EmployeDb();
$classeEmploye->modifEmployeId ($_SESSION["idCompte"], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel']);

$classeEntreprise = new EntrepriseDb();
$classeEntreprise->modifEntrepriseId ($_SESSION["idCompte"], $_POST['activite'], $_POST['adresse1'], $_POST['adresse2'], $_POST['ville'], $_POST['codePostal'], $_POST['raisonSociale'], $_POST['presentation']);
header ("location: professionnel.php");

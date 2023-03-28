<?php
require "modele/ClientDb.php";
session_start();
// mémorisation suite à une modification d'un client
$classeClient = new ClientDb();
$classeClient->modifClientId ($_SESSION["idCompte"], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel']);
header ("location: client.php");

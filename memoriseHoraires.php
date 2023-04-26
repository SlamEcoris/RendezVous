<?php
require "modele/HorairreDb.php";
session_start();
// mémorisation suite à une modification d'un client
$classeHoraire = new HorairreDb();
$horaires = $classeHoraire->getHorairreIdEntreprise($_SESSION["idEntreprise"]);

$lundiExiste = false;
$mardiExiste = false;
$mercrediExiste = false;
$jeudiExiste = false;
$vendrediExiste = false;
$samediExiste = false;
$dimancheExiste = false;

foreach ($horaires as $cle=>$valeur){
    if ($horaires[$cle]["date"]=="Lundi"){
        $lundiExiste = true;
    } elseif ($horaires[$cle]["date"]=="Mardi") {
        $mardiExiste = true;
    } elseif ($horaires[$cle]["date"]=="Mercredi") {
        $mercrediExiste = true;
    } elseif ($horaires[$cle]["date"]=="Jeudi") {
        $jeudiExiste = true;
    } elseif ($horaires[$cle]["date"]=="Vendredi") {
        $vendrediExiste = true;
    } elseif ($horaires[$cle]["date"]=="Samedi") {
        $samediExiste = true;
    } elseif ($horaires[$cle]["date"]=="Dimanche") {
        $dimancheExiste = true;
    }
}
if ($lundiExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Lundi", $_POST['lundiHeureDebAM'], $_POST['lundiHeureFinAM'], $_POST['lundiHeureDebPM'], $_POST['lundiHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Lundi", $_POST['lundiHeureDebAM'], $_POST['lundiHeureFinAM'], $_POST['lundiHeureDebPM'], $_POST['lundiHeureFinPM'],$_SESSION["idEntreprise"]);
}

if ($mardiExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Mardi", $_POST['mardiHeureDebAM'], $_POST['mardiHeureFinAM'], $_POST['mardiHeureDebPM'], $_POST['mardiHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Mardi", $_POST['mardiHeureDebAM'], $_POST['mardiHeureFinAM'], $_POST['mardiHeureDebPM'], $_POST['mardiHeureFinPM'],$_SESSION["idEntreprise"]);
}

if ($mercrediExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Mercredi", $_POST['mercrediHeureDebAM'], $_POST['mercrediHeureFinAM'], $_POST['mercrediHeureDebPM'], $_POST['mercrediHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Mercredi", $_POST['mercrediHeureDebAM'], $_POST['mercrediHeureFinAM'], $_POST['mercrediHeureDebPM'], $_POST['mercrediHeureFinPM'], $_SESSION["idEntreprise"]);
}

if ($jeudiExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Jeudi", $_POST['jeudiHeureDebAM'], $_POST['jeudiHeureFinAM'], $_POST['jeudiHeureDebPM'], $_POST['jeudiHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Jeudi", $_POST['jeudiHeureDebAM'], $_POST['jeudiHeureFinAM'], $_POST['jeudiHeureDebPM'], $_POST['jeudiHeureFinPM'], $_SESSION["idEntreprise"]);
}

if ($vendrediExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Vendredi", $_POST['vendrediHeureDebAM'], $_POST['vendrediHeureFinAM'], $_POST['vendrediHeureDebPM'], $_POST['vendrediHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Vendredi", $_POST['vendrediHeureDebAM'], $_POST['vendrediHeureFinAM'], $_POST['vendrediHeureDebPM'], $_POST['vendrediHeureFinPM'], $_SESSION["idEntreprise"]);
}

if ($samediExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Samedi", $_POST['samediHeureDebAM'], $_POST['samediHeureFinAM'], $_POST['samediHeureDebPM'], $_POST['samediHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Samedi", $_POST['samediHeureDebAM'], $_POST['samediHeureFinAM'], $_POST['samediHeureDebPM'], $_POST['samediHeureFinPM'], $_SESSION["idEntreprise"]);
}

if ($dimancheExiste==true){
    $classeHoraire->modifHorairreId ($_SESSION["idEntreprise"], "Dimanche", $_POST['dimancheHeureDebAM'], $_POST['dimancheHeureFinAM'], $_POST['dimancheHeureDebPM'], $_POST['dimancheHeureFinPM']);
} else {
    $classeHoraire->ajoutHorairreId ("Dimanche", $_POST['dimancheHeureDebAM'], $_POST['dimancheHeureFinAM'], $_POST['dimancheHeureDebPM'], $_POST['dimancheHeureFinPM'], $_SESSION["idEntreprise"]);
}

header ("location: professionnel.php");
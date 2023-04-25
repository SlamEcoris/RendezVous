<?php
require "modele/CompteDb.php";
require "modele/ClientDb.php";
session_start();

$cretionOk=true;
if ($_POST["mdp"]==$_POST["confirmMdp"]) {
    $classeComptes = new CompteDb();
    $comptes = $classeComptes->getComptes();
    foreach ($comptes as $cle => $valeur ) {
        if ($_POST["identifiant"]==$comptes[$cle]['identifiant']) { 
            ?>
            <script type="text/javascript">
                var msg = "L'identifiant saisit existe déjà. Voulez-vous ressayer ?";
                if(window.confirm(msg)) {
                        // On a répondu OK, on redirige l'utilisateur vers la page création de compte
                        <?php $_SESSION["preCreationCompte"]=array("preIdentifiant"=>$_POST["identifiant"], "preNom"=>$_POST["nom"], "prePrenom"=>$_POST["prenom"], "preMail"=>$_POST["email"], "preTel"=>$_POST["tel"]); ?>
                        window.location.href = 'creationCompteClient.php';
                } else {
                        // Ici c'est qu'on a répondu "Annulé", on redigie l'utilisateur vers la page index
                        window.location.href = 'index.php';
                }
            </script>
            <?php
            $cretionOk = false;
        }
    }
}
else {
    ?>
    <script type="text/javascript">
        var msg = "Le mot de passe et sa confirmation ne sont pas identiques. Voulez-vous ressayer ?";
        if(window.confirm(msg)) {
            // On a répondu OK, on redirige l'utilisateur vers la page création de compte
            <?php $_SESSION["preCreationCompte"]=array("preIdentifiant"=>$_POST["identifiant"], "preNom"=>$_POST["nom"], "prePrenom"=>$_POST["prenom"], "preMail"=>$_POST["email"], "preTel"=>$_POST["tel"]); ?>
            window.location.href = 'creationCompteClient.php';
        } else {
            // Ici c'est qu'on a répondu "Annulé", on redigie l'utilisateur vers la page index
            window.location.href = 'index.php';
        }
    </script>
    <?php
    $cretionOk = false;
}

if ($cretionOk == true) {
    $classeCompte = new CompteDb();
    $classeCompte->ajoutCompte ($_POST["identifiant"], $_POST["mdp"], 3);

    $compte = $classeCompte->getCompte($_POST["identifiant"], $_POST["mdp"]);
    $_SESSION["droit"] = $compte["droit"];
    $_SESSION["idCompte"] = $compte["id"];

    $classeClient = new ClientDb();
    $classeClient->ajoutClient ($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['tel'], $_SESSION["idCompte"]);
    
    if ($compte["droit"] == null) {
        //ouverture page 
        header ('Location: index.php');
    } elseif ($compte["droit"] == 2 ) {
        //ouverture page professionnel
        header ('Location: professionnel.php');
    } elseif ($compte["droit"] == 3 ) {
        //ouverture page client
        header ('Location: client.php');
    } else {
        //retour page accueil
        header ('Location: index.php');
    }
}
?>
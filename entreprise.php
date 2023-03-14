<body>
    <header class="site-header">
        <?php 
        require "EntrepriseDb.php";
        ?>
    </header>

    <?php 
		$activite = "activite";
		$adr1 = "adresse1";
		$adr2 = "adresse2";
		$cp = "7400";
		$ville = "Annecy";
		$raison = "Raison Sociale";
		$present = "Presentation de l entreprise";
        $classEntreprise = new EntrepriseDb();
		$classEntreprise->ajoutEntreprise($activite, $adr1, $adr2, $cp, $ville, $raison, $present);
/*        $auteurs = $classLivres->LivreAuteurs($idLivre);
        $nomAuteur="";
        if ($auteurs != null) {
          $nbAuteur = count ($auteurs);
          $ct = 1;
          foreach ($auteurs as $auteur) {
                if ($ct < $nbAuteur) {
                $nomAuteur .= $auteur['Nom']." / ";
                $ct++;
                }
                else {
                $nomAuteur .= $auteur['Nom'];
                }
            }
        }
        $titre = $livre['titre'];
        $couv = $livre ['Couv']; 
        $avis = $classAvis->getAvisLivre($idLivre);
        $affAvis = "";
        if ($avis != null) {
            $affAvis = "<table><tr><td>Note</td><td> </td><td>Détail</td></tr>";
            foreach ($avis as $avi){
                $affAvis .= "<tr><td>".$avi["Note"]."</td><td> </td><td>".$avi["Detail"]."</td></tr>";
            }
            $affAvis .= "</table>";
        }
    ?>
    <main class="site-content">
        <h1 class="title">
            <?php echo $titre; ?>
        </h1>
        <p class="title">JJ/MM/AAAA</p>
        <br>

        <h5>De : <?php echo $nomAuteur ?></h5>
        <p><?php echo $couv; ?></p>
        <br>
        <h5>Avis: 
            <?php echo $affAvis;
            ?>
        </h5>


        <button type="button" class="btn btn-outline-secondary btn-reserver">Réserver</button>
    </main>

</body>*/
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
    ?>
</body>
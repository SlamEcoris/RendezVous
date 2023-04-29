<body>
    <header class="site-header">
        <?php 
        require "CompteDb.php";
        ?>
    </header>

    <?php 
		$identifiant = "ident";
		$motPasse = "mdp";
		$droit = 1;
		$classCompte = new CompteDb();
		$classCompte->ajoutCompte($identifiant, $motPasse, $droit);
    ?>
</body>
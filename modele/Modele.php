<?php
abstract class Modele {
	private $bdd;
	
    protected function executerRequete($sql, $params = null) {
		$getBdd = $this->getBdd();
        if ($params == null){
            $resultat = $getBdd->query($sql);
        } else {
            $resultat = $getBdd->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }
  
    private function getBdd() {
		/* Connection local*/
        $dsn = "mysql:host=localhost;dbname=rendezvous;charset=utf8";
		$login = "root";
		$mdp = "";
       /* $dsn = "mysql:host=sioecorieqcrepea.mysql.db;dbname=sioecorieqcrepea;charset=utf8";
		$login = "sioecorieqcrepea";
		$mdp = "YyDdDnDCi2";*/
        if ($this->bdd == null){
            $this->bdd = new PDO($dsn,$login,$mdp,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}
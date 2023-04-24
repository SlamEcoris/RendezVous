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
		$dsn = "mysql:host=localhost;dbname=rendezvous;charset=utf8";
		$login = "root";
		$mdp = "";
        if ($this->bdd == null){
            $this->bdd = new PDO($dsn,$login,$mdp,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }
}
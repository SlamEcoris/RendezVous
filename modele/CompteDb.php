<?php
require_once 'Modele.php';
class CompteDb extends Modele {

	public function getComptes () {
		$sql = "SELECT id, identifiant, mdp, droit FROM compte";
		$compte = $this->executerRequete($sql);
		return $compte->fetchAll(PDO::FETCH_ASSOC);
	}

    public function getCompte ($identifiant, $mdp) {
		$sql = "SELECT id, droit FROM compte WHERE identifiant = ? AND mdp = ?"; 
		$resultat = $this->executerRequete($sql, array($identifiant, $this->cryptage($mdp)));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			return 0;
    }

    public function modifCompteId ($id, $identifiant, $mdp, $droit) {
		$sql = "UPDATE compte SET identifiant = ?, mdp = ?, droit = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($identifiant, $this->cryptage($mdp), $droit, $id));
	}

	public function ajoutCompte($identifiant, $mdp, $droit) {
		$sql = 'INSERT INTO compte(identifiant, mdp, droit) VALUES (?, ?, ?)';
		$this->executerRequete($sql, array($identifiant, $this->cryptage($mdp), $droit));
	}
	
	private function cryptage($info) {
		return hash('sha512',$info);
	}
}
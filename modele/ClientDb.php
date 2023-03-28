<?php
require_once 'Modele.php';
class ClientDb extends Modele {

    public function getClient ($id) {
		$sql = "SELECT nom, prenom, mail, telephone, idCompte FROM client WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			return 0;
    }

    public function modifClientId ($id, $nom, $prenom, $mail, $telephone, $idCompte) {
		$sql = "UPDATE client SET nom = ?, prenom = ?, mail = ?, telephone = ?, idCompte = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($nom, $prenom, $mail, $telephone, $idCompte, $id));
	}

	public function ajoutClient($nom, $prenom, $mail, $telephone, $idCompte) {
		$sql = 'INSERT INTO client(nom, prenom, mail, telephone, idCompte) VALUES (?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($nom, $prenom, $mail, $telephone, $idCompte));
	}
}
<?php
require_once 'Modele.php';
class EmployeDb extends Modele {

    public function getEmploye() {
        $sql = "SELECT id, nom, prenom, mail, telephone, idCompte, idEntreprise FROM employe";
		$employe = $this->executerRequete($sql);
		return $employe->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmployeId ($id) {
		$sql = "SELECT nom, prenom, mail, telephone, idCompte, idEntreprise FROM employe WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			throw new Exception("Pas de résultat");
    }

	public function modifEmployeId ($id, $nom, $prenom, $mail, $telephone) {
		$sql = "UPDATE employe SET nom = ?, prenom = ?, mail = ?, telephone = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($nom, $prenom, $mail, $telephone, $id));
		   }
}
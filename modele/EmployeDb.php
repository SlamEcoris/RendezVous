<?php
require_once 'Modele.php';
class EmployeDb extends Modele {

    public function getEmploye() {
        $sql = "SELECT id, civilite, nom, prenom, mail, telephone idCompte, idEntreprise FROM employe";
		$employes = $this->executerRequete($sql);
		return $employes->fetchAll(PDO::FETCH_ASSOC);
    }

 	public function getEmployeId ($idEmploye) {
		$sql = "SELECT civilite, nom, prenom, mail, telephone FROM employe WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($idEmploye));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
	}
}

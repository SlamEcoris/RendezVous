<?php
require_once 'Modele.php';
class EntrepriseDb extends Modele {

    public function getEntreprises() {
        $sql = "SELECT id, activite, adresse1, adresse2, codePostal, ville, raisonSociale, presentation FROM entreprise";
		$entreprises = $this->executerRequete($sql);
		return $entreprises;
    }

    public function getEntrepriseId ($id) {
		$sql = "SELECT activite, adresse1, adresse2, codePostal, ville, raisonSociale, presentation FROM entreprise WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch();
		else
			throw new Exception("Pas de résultat");
    }

    public function modifEntrepriseId ($id, $activite, $adr1, $adr2, $cp, $ville, $raison, $present) {
		$sql = "UPDATE entreprise SET activite = ?, adresse1 = ?, adresse2 = ?, codePostal = ?, 
				ville = ?, raisonSociale = ?, presentation = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($activite, $adr1, $adr2, $cp, $ville, $raison, $present, $id));
		   }

	public function ajoutEntreprise($activite, $adr1, $adr2, $cp, $ville, $raison, $present) {
		$sql = 'INSERT INTO entreprise(activite, adresse1, adresse2, codePostal, 
				ville, raisonSociale, presentation) VALUES (?, ?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($activite, $adr1, $adr2, $cp, $ville, $raison, $present));
  }
}

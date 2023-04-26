<?php
require_once 'Modele.php';
class EntrepriseDb extends Modele {

    public function getEntreprises() {
        $sql = "SELECT id, activite, adresse1, adresse2, codePostal, ville, raisonSociale, presentation, dureCreneaux FROM entreprise";
		$entreprises = $this->executerRequete($sql);
		return $entreprises;
    }

    public function getEntrepriseId ($id) {
		$sql = "SELECT activite, adresse1, adresse2, codePostal, ville, raisonSociale, presentation, dureCreneaux FROM entreprise WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
    }

    public function modifEntrepriseId ($id, $activite, $adr1, $adr2, $cp, $ville, $raison, $present, $dureCreneaux) {
		$sql = "UPDATE entreprise SET activite = ?, adresse1 = ?, adresse2 = ?, codePostal = ?, 
				ville = ?, raisonSociale = ?, presentation = ?, dureCreneaux = ? WHERE id = ?"; 
		$this->executerRequete($sql, array ($activite, $adr1, $adr2, $cp, $ville, $raison, $present, $dureCreneaux, $id));
		   }

	public function ajoutEntreprise($activite, $adr1, $adr2, $cp, $ville, $raison, $present, $dureCreneaux) {
		$sql = 'INSERT INTO entreprise(activite, adresse1, adresse2, codePostal, 
				ville, raisonSociale, presentation, dureCreneaux) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($activite, $adr1, $adr2, $cp, $ville, $raison, $present, $dureCreneaux));
  }
}

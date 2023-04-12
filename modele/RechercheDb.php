<?php
require_once 'Modele.php';
class RechercheDb extends Modele {

    /*public function getRecherchePros($recherche1, $recherche2, $recherche3, $recherche4) {
        $sql = "SELECT employe.id
				FROM employe
				JOIN entreprise on employe.idEntreprise=entreprise.id
				WHERE employe.nom LIKE ?
					OR employe.prenom LIKE ?
					OR entreprise.activite LIKE ?
					OR entreprise.presentation LIKE ?";
		$rendezVous = $this->executerRequete($sql, array($recherche1, $recherche2, $recherche3, $recherche4));
		return $rendezVous->fetchAll(PDO::FETCH_ASSOC);
    }*/

	public function getRecherchePros($recherche1) {
        $sql = "SELECT employe.id
				FROM employe
				JOIN entreprise on employe.idEntreprise=entreprise.id
				WHERE employe.nom LIKE ?
					OR employe.prenom LIKE ?
					OR entreprise.activite LIKE ?
					OR entreprise.presentation LIKE ?";
		$recherche = $this->executerRequete($sql, array($recherche1, $recherche1, $recherche1, $recherche1));
		if ($recherche->rowCount() > 0)
			return $recherche->fetchAll();
		else
			return 0;
    }
}
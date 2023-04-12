<?php
require_once 'Modele.php';
class RechercheDb extends Modele {

	public function getRecherchePros($recherche1) {
		$recherche1 = "%".$recherche1."%";
        $sql = "SELECT employe.id, employe.nom,employe.prenom
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
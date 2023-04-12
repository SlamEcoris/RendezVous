<?php
require_once 'Modele.php';
class RechercheDb extends Modele {

    public function getRecherchePros($recherche) {
        $sql = "SELECT employe.id
				FROM employe
				JOIN entreprise on employe.idEntreprise=entreprise.id
				WHERE employe.nom LIKE '%?%'
					OR employe.prenom LIKE '%?%'
					OR entreprise.activite LIKE '%?%'
					OR entreprise.presentation LIKE '%?%';";
		$rendezVous = $this->executerRequete($sql);
		return $rendezVous->fetchAll(PDO::FETCH_ASSOC);
    }
}
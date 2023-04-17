<?php
require_once 'Modele.php';
class RechercheDb extends Modele {

	public function getRecherchePros($recherche1) {
		$recherche1 = "%".$recherche1."%";
        $sql = "SELECT employe.id, employe.nom, employe.prenom
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

	public function getRechercheVille($ville) {
		$ville = "%".$ville."%";
        $sql = "SELECT employe.id, employe.nom, employe.prenom
				FROM employe
				JOIN entreprise on employe.idEntreprise=entreprise.id
				WHERE entreprise.ville LIKE ?
			  		OR entreprise.codePostal LIKE ?";
		$recherche = $this->executerRequete($sql, array($ville, $ville));
		if ($recherche->rowCount() > 0)
			return $recherche->fetchAll();
		else
			return 0;
    }

	public function getRechercheProsVille($recherche, $ville) {
		$ville = "%".$ville."%";
        $sql = "SELECT employe.id, employe.nom, employe.prenom
				FROM employe
				JOIN entreprise on employe.idEntreprise=entreprise.id
				WHERE (entreprise.ville LIKE ? 
						AND (employe.nom LIKE ? 
							OR employe.prenom LIKE ?
							OR entreprise.activite LIKE ? 
							OR entreprise.presentation LIKE ?))
			  		OR (entreprise.codePostal LIKE ? 
						AND (employe.nom LIKE ? 
							OR employe.prenom LIKE ? 
							OR entreprise.activite LIKE ? 
							OR entreprise.presentation LIKE ?));";
		$recherche = $this->executerRequete($sql, array($ville, $recherche, $recherche, $recherche, $recherche, $ville, $recherche, $recherche, $recherche, $recherche));
		if ($recherche->rowCount() > 0)
			return $recherche->fetchAll();
		else
			return 0;
    }
}
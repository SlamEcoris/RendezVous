<?php
require_once 'Modele.php';
class contenuDb extends Modele {

    public function getContenu() {
        $sql = "SELECT id, date, heureDebut, heureFin, objet, idClient, idEmploye FROM rendezvous";
		$rendezVous = $this->executerRequete($sql);
		return $rendezVous->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRendezVousId ($id) {
		$sql = "SELECT date, heureDebut, heureFin, objet, idClient, idEmploye FROM rendezvous WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount(PDO::FETCH_ASSOC) > 0)
			return $resultat->fetch();
		else
			throw new Exception("Pas de résultat");
    }

    public function getRendezVousIdClient ($idClient) {
		$sql = "SELECT id, date, heureDebut, heureFin, objet, idEmploye FROM rendezvous WHERE idClient = ?"; 
		$resultat = $this->executerRequete($sql, array($idClient));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
    }

}
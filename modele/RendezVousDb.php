<?php
require_once 'Modele.php';
class RendezVousDb extends Modele {

    public function getRendezVous() {
        $sql = "SELECT id, date, heureDebut, heureFin, objet, idClient, idEmploye FROM rendezvous";
		$rendezVous = $this->executerRequete($sql);
		return $rendezVous->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRendezVousId ($id) {
		$sql = "SELECT date, heureDebut, heureFin, objet, idClient, idEmploye FROM rendezvous WHERE id = ?"; 
		$resultat = $this->executerRequete($sql, array($id));
		if ($resultat->rowCount() > 0)
			return $resultat->fetch(PDO::FETCH_ASSOC);
		else
			return null;
    }

    public function getRendezVousIdClient ($idClient) {
		$sql = "SELECT id, date, heureDebut, heureFin, objet, idEmploye FROM rendezvous WHERE idClient = ? AND date >= CURRENT_DATE"; 
		$resultat = $this->executerRequete($sql, array($idClient));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			return null;
    }

	public function getRendezVousIdEmploye ($idEmploye) {
		$sql = "SELECT id, date, heureDebut, heureFin, objet, idClient FROM rendezvous WHERE idEmploye = ? AND date >= CURRENT_DATE"; 
		$resultat = $this->executerRequete($sql, array($idEmploye));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			return null;
    }

	public function ajoutRendezVous($date, $heureDebut, $heureFin, $objet, $idClient, $idEmploye) {
		$sql = 'INSERT INTO rendezvous(date, heureDebut, heureFin, objet, idClient, idEmploye) VALUES (?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($date, $heureDebut, $heureFin, $objet, $idClient, $idEmploye));
	}

	public function deleteRendezVousId($id) {
		$sql = 'DELETE FROM rendezvous WHERE id = ?';
		$this->executerRequete($sql, array($id));
	}
}

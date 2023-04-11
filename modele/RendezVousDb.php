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

	public function getRendezVousIdEmploye ($idEmploye) {
		$sql = "SELECT id, date, heureDebut, heureFin, objet, idClient FROM rendezvous WHERE idEmploye = ?"; 
		$resultat = $this->executerRequete($sql, array($idEmploye));
		if ($resultat->rowCount() > 0)
			return $resultat->fetchAll(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
    }

	public function getRendezVousDetail ($idEmploye) {
		$sql = "SELECT civilite, nom, prenom, mail, telephone, adresse1, adresse2, codePostal, ville FROM employe 
			INNER JOIN entreprise ON entreprise.id = employe.idEntreprise WHERE employe.id = ?";
		$resultat = $this->executerRequete($sql, array($idEmploye));
		if ($resultat->rowCount() >0 )
			return $resultat->fetch(PDO::FETCH_ASSOC);
		else
			throw new Exception("Pas de résultat");
	}

	public function delRendezVous ($id) {
		$sql = "DELETE FROM rendezvous WHERE id =?";
		$this->executerRequete($sql, $id);
	}

	public function setRendezVous ($date, $heureDeb, $heureFin, $objet, $idClient, $idEmploye) {
		$sql = 'INSERT INTO rendezvous(date, heureDeb, heureFin, objet, idClient, idEmploye) VALUES (?, ?, ?, ?, ?, ?)';
		$this->executerRequete($sql, array($date, $heureDeb, $heureFin, $objet, $idClient, $idEmploye));
	}
}
